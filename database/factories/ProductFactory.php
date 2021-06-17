<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'brand_id' => Brand::all()->random()->id,
            'name' => $this->faker->unique()->word,
            'stock_number' => $this->faker->regexify('[A-Za-z0-9]{6}'),
            'allow_suggest' => $this->faker->boolean(20)
        ];
    }
}
