<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'total' => 0,
            'status' => fake()->randomElement(['pending', 'paid', 'shipped', 'delivered']),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
