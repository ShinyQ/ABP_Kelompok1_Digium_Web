<?php

namespace Database\Factories;

use App\Models\Museum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::get()->random()->id,
            'museum_id'=> Museum::get()->random()->id,
            'total_price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            'qty' => rand(1,20),
            'status'=> $this->faker->randomElement(['Waiting Payment', 'Paid', 'Cancelled']),
            'created_at' => Carbon::now()->timestamp,
            'updated_at' => Carbon::now()->timestamp,
        ];
    }
}
