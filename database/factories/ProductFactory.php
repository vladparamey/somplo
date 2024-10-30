<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'seller_id' => Seller::factory(),
            'phone_name' => $this->faker->unique()->word,
            'display_size' => $this->faker->numberBetween(2, 7),
            'quantity' => $this->faker->numberBetween(1, 100),
            'cost' => $this->faker->randomFloat(2, 100, 2000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
