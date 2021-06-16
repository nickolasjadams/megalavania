<?php

namespace Database\Factories;

use App\Models\B2bBusiness;
use App\Models\Brand;
use App\Models\BrandUser;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderStatus;
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
        // UNFINISHED. PARENT TABLE DATA NEEDS TO BE BUILT FIRST.
        // THE SEEDER WILL REFERENCE PARENT TABLE MODELS, SO THE DATA MUST BE GENERATED BEFORE THIS TABLE.
        // STILL NEED BRAND_ID AND ORDER_STATUS_ID.
        $user = User::factory()->create();
        $brand = Brand::factory()->create();
        BrandUser::factory()->create([
            'brand_id' => $brand,
            'user_id' => $user,
        ]);
        $b2bBusiness = B2bBusiness::factory()->create([
            'user_id' => $user
        ]);
        $price = $this->faker->numberBetween(10, 200);
        $status = $this->faker->numberBetween(1, 4);

        return [
            'user_id' => $user,
            'customer_id' => Customer::factory()->create([
                'user_id' => $user,
                'b2b_business_id' => $b2bBusiness
            ]),
            'b2b_business_id' => $b2bBusiness,
            'brand_id' => $brand,
            'ticket' => $this->faker->numerify('####'),
            'price' => $price,
            'deposit' => (random_int(0,1)) ? ($price / 2) : NULL,
            'paid_at' => null,
            'initial' => $this->faker->regexify('[A-Za-z0-9]{3}'),
            'comment' => $this->faker->realText(250),
            'stock_number' => $this->faker->numerify('########'),
            'product_name' => $this->faker->word . ' ' . $this->faker->word,
            'order_status_id' => $status,
        ];
    }
}
