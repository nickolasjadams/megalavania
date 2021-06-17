<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::all()->random()->id,
            'street' => $this->faker->streetAddress,
            'suite' => $this->faker->secondaryAddress,
            'state' => $this->faker->state,
            'zip' => $this->faker->postcode,
            'default' => false
        ];
    }
}
