<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Database\Seeder;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $faker;

    public function __construct(Generator $faker)
    {
        $this->faker=$faker;
    }

    public function run()
    {
        $data = [
            [
                'name' => 'Jatim Park Diskon',
                'image' => 'https://res.cloudinary.com/dqifwyjx6/image/upload/v1670263241/Banner/20211115090608_Screenshot_473_v2aroj.png',
                'link' => 'https://jtp.id/',
            ],
            [
                'name' => 'Promo Museum Angkut',
                'image' => 'https://res.cloudinary.com/dqifwyjx6/image/upload/v1670263215/Banner/Promo-Museum-Angkut-Batu-Malang_izblz9.jpg',
                'link' => 'https://jtp.id/museumangkut/',
            ],
            [
                'name' => 'Jatim Park Diskon 2022',
                'image' => 'https://res.cloudinary.com/dqifwyjx6/image/upload/v1670263159/Banner/image_14_yvi648.png',
                'link' => 'https://jtp.id/',
            ]
        ];

        DB::table('banners')->insert($data);
    }
}
