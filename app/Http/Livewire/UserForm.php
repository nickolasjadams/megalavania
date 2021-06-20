<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserForm extends Component
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
    public $wants_sms = '';
    public $customerSet = false;
    public function render()
    {
        // // $user = User::find();
        // $this->customers = DB::table('customers')->where('user_id', auth()->id())
        // ->where(function($query) {
        //     $query->when(!is_null($this->phone), function ($q) {
        //         $q->where('phone', 'like', '%'.$this->phone.'%');
        //      })
        //      ->when(!is_null($this->name), function ($q) {
        //         $q->where('name', 'like', '%'.$this->name.'%');
        //      });
        // })
        if(!$this->set)
        {
            $this->findUser();

        }

        return view('livewire.user-form', [
            'customers' => $this->customers
        ]);
    }

    private function findUser()
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
        if($this->customers->count() == 1 && ($this->phone || $this->name))
        {

                $customer = $this->customers->first()->toArray();
                $address = Address::where('customer_id', $customer['id'])
                ->where('default', 1)
                ->first()
                ->toArray();
                $this->setCustomer($customer, $address);
        }
    }

    public function resetCustomer()
    {
        $this->name = '';
        $this->phone = '';
        $this->email = '';
        $this->wants_sms = '';
        $this->street = '';
        $this->suite = '';
        $this->state = '';
        $this->zip = '';
        $this->set = false;
    }

    private function setCustomer($customer, $address)
    {
        $this->name = $customer['name'];
        $this->phone = $customer['phone'];
        $this->email = $customer['email'];
        if($customer['wants_sms'])
        {
            $this->wants_sms = "yes";
        }
        $this->street = $address['street'];
        $this->suite = $address['suite'];
        $this->state = $address['state'];
        $this->zip = $address['zip'];
        $this->set = true;
    }

}
