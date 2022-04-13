<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransactionItem;

class TransactionItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'transaction_id' => "1",
                'name' => 'Kurniadi Ahmad Wijaya',
                'qr_code' => 'assets\images\transaction\1\1digium7.png'
            ],

            [
                'transaction_id' => "1",
                'name' => 'Michael Putera Wardana',
                'qr_code' => 'assets\images\transaction\1\1digium75.png'
            ],

            [
                'transaction_id' => "1",
                'name' => 'Imam Rafiif',
                'qr_code' => 'assets\images\transaction\1\1digium76.png'
            ],

            [
                'transaction_id' => "1",
                'name' => 'Jerry Cahyo Setiawan',
                'qr_code' => 'assets\images\transaction\1\1digium81.png'
            ],

            [
                'transaction_id' => "1",
                'name' => 'Rara Cloud Engineer',
                'qr_code' => 'assets\images\transaction\1\1digium119.png'
            ],
        ];
        TransactionItem::insert($data);
        TransactionItem::factory()->count(150)->create();
    }
}
