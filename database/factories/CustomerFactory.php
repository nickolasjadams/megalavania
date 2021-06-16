<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use App\Models\B2bBusiness;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'b2b_business_id' => B2bBusiness::all()->random()->id,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone' => preg_replace('/[^\d]/', '', $this->faker->phoneNumber),
            'email' => $this->faker->unique()->safeEmail,
            'street' => $this->faker->streetAddress,
            'state' => $this->faker->state,
            'zip' => $this->faker->postcode,
            'wants_sms' => $this->faker->boolean(50),
        ];
    }
}
