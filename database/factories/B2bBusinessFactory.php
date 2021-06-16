<?php

namespace Database\Factories;

use App\Models\B2bBusiness;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class B2bBusinessFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = B2bBusiness::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->company,
            'manager' => $this->faker->name(),
            'phone' => preg_replace('/[^\d]/', '', $this->faker->phoneNumber),
            'email' => $this->faker->unique()->safeEmail,
            'street' => $this->faker->streetAddress,
            'state' => $this->faker->state,
            'zip' => $this->faker->postcode,
        ];
    }
}
