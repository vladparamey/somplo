<?php

namespace Database\Factories;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Seller>
 */
class SellerFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Seller::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'seller_name' => $this->faker->unique()->company,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
