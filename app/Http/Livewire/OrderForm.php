<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrderForm extends Component
{
    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
    ];

    public $customers;
    public $name = '';
    public $phone = '';
    public $email = '';
    public $street = '';
    public $suite = '';
    public $state = '';
    public $zip = '';
    public $wantsSms = '';
    public $ticket;
    public $brands;
    public $brand;
    public $stockNumber;
    public $product;
    public $products;
    public $size;
    public $price;
    public $deposit;
    public $paid;
    public $comment;
    public $customer;
    public $mail = false;
    public $customerSet = false;
    public $addresses;
    public $addressId;
    public function render()
    {
        if(!$this->customer)
        {
            $this->findCustomer();
        }

        $user = User::find(auth()->id());
        $this->brands = $user->brands;
        // $this->brands = Brand::all();
        if($this->brand)
        {
            $this->products = DB::table('products')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->select('brands.name as brand_name', 'products.name as name', 'stock_number')
            ->having('brand_name', $this->brand)
            ->get();
        }
        return view('livewire.order-form');
    }
    private function findCustomer()
    {
        $this->customers = Customer::
        where('user_id', auth()->id())
        ->where(function($query) {
            $query->when(!is_null($this->phone), function ($q) {
                $q->where('phone', 'like', '%'.$this->phone.'%');
             })
             ->when(!is_null($this->name), function ($q) {
                $q->where('name', 'like', '%'.$this->name.'%');
             });
        })
        ->limit(10)
        ->get();
        /**
         * if results only have one customer and at least phone or name
         * variable has a value in order to keep the system from autofilling
         * form if a user only has one customer
         *
         */
        if($this->customers->count() == 1 && (strlen($this->phone) == 10 || strlen($this->name) > 6))
        {

                $this->customer = $this->customers->first()->toArray();
                $this->addresses = Address::where('customer_id', $this->customer['id'])
                ->get();
                $this->addressId = $this->addresses
                ->where('default', 1)
                ->first()->id;
                $this->setCustomer($this->customer);
                $this->customerSet = true;
        }
    }

    public function resetCustomer()
    {
        $this->name = '';
        $this->phone = '';
        $this->email = '';
        $this->wantsSms = '';
        $this->set = false;
    }

    public function setCustomer($customer)
    {
        $this->name = $customer['name'];
        $this->phone = $customer['phone'];
        $this->email = $customer['email'];
        if($customer['wants_sms'])
        {
            $this->wantsSms = true;
        }

        $this->set = true;
    }

    public function setMail($address)
    {
        $this->street = $address['street'];
        $this->suite = $address['suite'];
        $this->state = $address['state'];
        $this->zip = $address['zip'];
    }
}
