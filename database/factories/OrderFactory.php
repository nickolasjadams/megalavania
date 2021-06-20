<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\B2bBusiness;
use App\Models\Brand;
use App\Models\BrandUser;
use App\Models\Category;
use App\Models\CategoryUser;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        $user = User::factory()->create();
        $category = Category::factory()->create();
        $brand = Brand::factory()->create();
        BrandUser::factory()->create([
            'brand_id' => $brand,
            'user_id' => $user,
        ]);
        CategoryUser::factory()->create([
            'category_id' => $category,
            'user_id' => $user,
        ]);
        $product = Product::factory()->create([
            'user_id' => $user,
            'brand_id' => $brand,
        ]);
        $b2bBusiness = B2bBusiness::factory()->create([
            'user_id' => $user
        ]);
        $price = $this->faker->numberBetween(10, 200);
        $status = $this->faker->numberBetween(1, 4);
        $customer = Customer::factory()->create([
            'b2b_business_id' => $b2bBusiness
        ]);
        Address::factory()->create([
            'customer_id' => $customer,
            'default' => true
        ]);
        return [
            'user_id' => $user,
            'customer_id' => $customer,
            'b2b_business_id' => $b2bBusiness,
            'ticket' => $this->faker->numerify('####'),
            'price' => $price,
            'deposit' => (random_int(0,1)) ? ($price / 2) : 0,
            'paid_at' => null,
            'initial' => $this->faker->regexify('[A-Za-z0-9]{3}'),
            'comment' => $this->faker->realText(250),
            'order_status_id' => $status,
        ];
    }
}
