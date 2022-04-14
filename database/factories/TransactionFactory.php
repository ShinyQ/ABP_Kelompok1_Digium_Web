<?php

namespace Database\Factories;

use App\Models\Museum;
use App\Models\Transaction;
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
        $qty = rand(1, 10);
        $receipt = null;
        $museum = Museum::get()->random();

        $status = $this->faker->randomElement([
            'Waiting Verification',
            'Waiting Payment',
            'Paid',
            'Cancelled'
        ]);


        if ($status == 'Waiting Verification' || $status == 'Paid'){
            $receipt =  $this->faker->randomElement([
                'https://pbs.twimg.com/media/Czx7juDUcAAhOxg.jpg',
                'https://www.itworks.id/wp-content/uploads/2021/05/Struk-ATM-Link.jpg',
                'https://pbs.twimg.com/media/DDIFvpdVwAAhrhb.jpg',
                'https://pbs.twimg.com/media/Dme6YrEVsAIR5eO.jpg'
            ]);
        }

        return [
            'user_id' => User::get()->random()->id,
            'museum_id'=> $museum->id,
            'total_price' => $museum->price * $qty,
            'qty' => $qty,
            'receipt' => $receipt,
            'status'=> $status,
            'created_at' => Carbon::now()->addDays(rand(1, 14)),
            'updated_at' => Carbon::now()->timestamp,
        ];
    }
}
