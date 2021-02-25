<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Order;
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
        $user_id = User::all()->random()->id;
        $price = $this->faker->numberBetween(10, 200);
        $status = $this->faker->numberBetween(1, 4);
        return [
            'user_id' => $user_id,
            'customer_id' => Customer::all()->where('user_id', $user_id)->random()->id,
            'price' => $price,
            'deposit' => (random_int(0,1)) ? ($price / 2) : NULL,
            'paid_at' => $this->faker->lastName,
            'initial' => $this->faker->regexify('[A-Za-z0-9]{3}'),
            'comment' => $this->faker->realText(250),
            'brand_id' => '',
            'stock_number' => $this->faker->numerify('########'),
            'product_name' => $this->faker->word . ' ' . $this->faker->word,
            'order_status_id' => '',
        ];
    }
}
