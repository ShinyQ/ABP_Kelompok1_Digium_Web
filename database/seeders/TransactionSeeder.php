<?php

namespace Database\Seeders;

use App\Models\Museum;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qty = rand(1, 10);
        $museum = Museum::get()->random();

        $data = [
            [
                'user_id' => User::get()->random()->id,
                'museum_id'=> $museum->id,
                'total_price' => $museum->price * $qty,
                'qty' => $qty,
                'receipt' => 'https://pbs.twimg.com/media/Czx7juDUcAAhOxg.jpg',
                'status'=> 'Paid',
                'created_at' => Carbon::now()->addDays(rand(1, 14)),
            ]
        ];

        Transaction::insert($data);
        Transaction::factory()->count(80)->create();
    }
}
