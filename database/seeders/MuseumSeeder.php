<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Museum;
use Illuminate\Support\Facades\DB;

class MuseumSeeder extends Seeder
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
                'name' => 'Museum Angkut',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE5QvVSUjAJWu_YQgnM%2FBackground%2FBackground.jpg?alt=media&token=d053462e-7d97-49fd-9e3f-16516ce67bec',
                'panorama' => '',
                'description' => 'Museum unik yang menampilkan adegan & karakter film Hollywood, serta mobil, tank, & moped.',
                'address' => 'Jl. Terusan Sultan Agung No.2, Ngaglik, Kec. Batu, Kota Batu, Jawa Timur 65314',
                'phone' => '(0341) 595007',
                'year_built' => '9 Maret 2014',
                'latitude' => -7.8789,
                'longitude' => 112.5182, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum Sampoerna',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE5Rj8-rlwDZQMc3ioO%2FBackground%2Fbackground.jpg?alt=media&token=72c6d58d-1390-4640-8cbb-054242260810',
                'panorama' => '',
                'description' => 'Museum, kafe, & toko suvenir yang berada di fasilitas produksi perusahaan rokok milik Kolonial Belanda.',
                'address' => 'Taman Sampoerna No.6, Krembangan Utara, Pabean Cantian, Kota SBY, Jawa Timur 60163',
                'phone' => '(031) 3539000',
                'year_built' => '1862',
                'latitude' => -7.230805,
                'longitude' => '112.7342', 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum Satwa',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE7zWwXwW8yn0T5Flja%2FBackground%2Fbackground.jpg?alt=media&token=a2fb18f4-16c0-4fe6-b5d3-e0f8ce413894',
                'panorama' => '',
                'description' => 'Museum satwa liar yang menghadirkan hewan dan fosil yang diawetkan dari seluruh dunia, & replika dinosaurus.',
                'address' => 'Jl. Patimura No.23, Temas, Kec. Batu, Kota Batu, Jawa Timur 65315',
                'phone' => '(0341) 597777',
                'year_built' => '27 Desember 2009',
                'latitude' => -7.8890,
                'longitude' => 112.5285, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum Dan Perpustakaan Bung Karno',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE7zgmMCMBu1JQwgnXa%2FBackground%2FBackground.jpg?alt=media&token=aced974c-0891-4a5a-87fd-755172b16e33',
                'panorama' => '',
                'description' => 'Museum yang menghadirkan koleksi-koleksi dari bapak proklamator Ir. Soekarno',
                'address' => 'Jl. Kalasan No.1, Bendogerit, Sananwetan, Kota Blitar, Jawa Timur 66133',
                'phone' => '(0342) 815477',
                'year_built' => '4 Juli 2004',
                'latitude' => -8.0850,
                'longitude' => 112.1753, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum Malang Tempoe Doeloe',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE7zkayFpBEMy-_4MaB%2FBackground%2Fbackground.jpg?alt=media&token=4ebb9657-5fce-4fb5-97ca-34b1000d6350',
                'panorama' => '',
                'description' => 'Museum lokal yang menyuguhkan sejarah & budaya Malang, mulai dari zaman kuno hingga kemerdekaan.',
                'address' => 'Jl. Gajahmada, Kiduldalem, Klojen, Kota Malang, Jawa Timur 65119',
                'phone' => '(0341) 6802301',
                'year_built' => '22 Oktober 2012',
                'latitude' => -7.9781,
                'longitude' => 112.6348, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum Tubuh Manusia Bagong Adventure',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE7zpMq2Ebu647U160h%2FBackground%2FBackground.jpg?alt=media&token=33820de9-7437-4254-8260-75b5a987c732',
                'panorama' => '',
                'description' => 'Museum interaktif yang menyuguhkan pameran pendidikan tentang bagian & fungsi tubuh manusia.',
                'address' => 'Jl. Kartika No.2, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65314',
                'phone' => '(0341) 597777',
                'year_built' => '20 Desember 2014',
                'latitude' => -7.8827,
                'longitude' => 112.5240, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
         [  
                'name' => 'Museum Keraton Sumenep',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE885UdML7GWyKBrjyw%2FBackground%2FBackground.jpg?alt=media&token=417b3228-51c6-4401-91c4-5596e68978b5',
                'panorama' => '',
                'description' => 'Museum yang menyajikan sejarah pengetahuan tentang budaya madura serta warisan benda benda dan bangunan kuno.',
                'address' => 'Jl. Dr. Sutomo No.6, Lingkungan Delama, Kabupaten Sumenep, Jawa Timur 69416',
                'phone' => '(0328) 667148',
                'year_built' => '1965',
                'latitude' => -7.0075,
                'longitude' => 113.8622, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum 10 November',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE889-UCFUaTTerva83%2FBackground%2FBackground.jpg?alt=media&token=9f5f7058-021d-4a71-a850-961a91eb11ce',
                'panorama' => '',
                'description' => 'Museum lokal yang menyuguhkan sejarah tentang kota Surabaya.',
                'address' => 'Jl. Pahlawan, Alun-alun Contong, Bubutan, Kota SBY, Jawa Timur 60174',
                'phone' => '(031) 3571100',
                'year_built' => '10 November 1951',
                'latitude' => -7.2451,
                'longitude' => 112.7380, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum Kanker Indonesia',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE88BE0FIaanqoOSrb6%2FBackground%2FBackground.jpg?alt=media&token=8c0b92c6-fc1f-41f7-a95d-a56234e78b55',
                'panorama' => '',
                'description' => 'Museum yang menghadirkan pengetahuan seputar penyakit kanker.',
                'address' => 'Jl. Kayon No.16-18, Embong Kaliasin, Genteng, Kota SBY, Jawa Timur 60271',
                'phone' => '0818-302-761',
                'year_built' => '2 November 2013',
                'latitude' => -7.2663,
                'longitude' => 112.7489, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum Majapahit (Trowulan)',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE88CrBX820DdBFDwHU%2FBackground%2FBackground.jpg?alt=media&token=cb4f1d6c-47c7-4e4e-a0d3-1a34b0c1b747',
                'panorama' => '',
                'description' => 'Museum Sejarah yang menyimpan berbagai macam barang peninggalan serta sejarah jaman kerajaan majapahit.',
                'address' => 'Trowulan, Jalan Pendopo Agung, Ngelinguk, Mojokerto, Jawa Timur 61362',
                'phone' => '(0321) 494313',
                'year_built' => '1987',
                'latitude' => -7.5591,
                'longitude' => 112.3806, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum Anjuk Ladang',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE_YomXoNUXByM_sVdR%2FBackground%2FBackground.jpg?alt=media&token=4e77405b-2fa3-43a5-bbc0-0ae833681982',
                'panorama' => '',
                'description' => 'Museum Anjuk Ladang merupakan Museum Daerah Kabupaten Nganjuk yang berfungsi untuk menyimpan semua peninggalan Benda cagar budaya dan penemuan di kabupaten Nganjuk.',
                'address' => 'Jl. Gatot Subroto, Ringin Anom, Kauman, Kabupaten Nganjuk, Jawa Timur 64411',
                'phone' => '(0358) 321793',
                'year_built' => '1996',
                'latitude' => -7.5932,
                'longitude' => 111.8939, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum Orasis Gallery',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE_YsWdBMf181WBKexl%2FBackground%2FBackground.jpg?alt=media&token=41cc87c1-0494-4434-a496-0a23e41807f0',
                'panorama' => '',
                'description' => 'Museum yang menampilkan gallery art berupa lukisan, patung, buku-buku seni yang berfokus pada seni rupa.',
                'address' => 'Jalan HR. Muhammad St No.94, Pradahkalikendal, Dukuh Pakis, Surabaya, Jawa Timur 60226',
                'phone' => '(031) 7340507',
                'year_built' => '2005',
                'latitude' => -7.2839,
                'longitude' => 112.6910, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum Probolinggo',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE_Yv8ZgI7gyQ2ufhoj%2FBackground%2FBackground.jpg?alt=media&token=120d5fd7-2067-427c-a661-99e1db5044a7',
                'panorama' => '',
                'description' => 'Museum Probolinggo, Merupakan destinasi wisata yang menawarkan konsep sejarah dari Probolinggo mulai dari pemerintahan sampai benda peninggalan bersejarah.',
                'address' => 'Jl. Suroyo, Tisnonegaran, Kanigaran, Kota Probolinggo, Jawa Timur 67211',
                'phone' => '0853-3543-3334',
                'year_built' => '26 Agustus 2009',
                'latitude' => -7.7510,
                'longitude' => 113.2135, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum Airlangga',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE_YxvxQHRlpeOZkQ85%2FBackground%2FBackground.jpg?alt=media&token=e0d2a6a3-03bb-4271-bb4b-a8db0f7af642',
                'panorama' => '',
                'description' => 'Museum yang mengoleksi benda benda peninggalan bersejarah yang berasal dari kota Kediri',
                'address' => 'Jl. Lingkar Maskumambang, Pojok, Mojoroto, Kota Kediri, Jawa Timur 64115',
                'phone' => '(0354) 773157',
                'year_built' => '6 Februari 1992',
                'latitude' => -7.8075,
                'longitude' => 111.9716, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum Fotografi Kediri',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE_Z2m00IDwMrOGCP9V%2FBackground%2FBackground.jpg?alt=media&token=55d4e511-0684-4e08-ba98-d2311e4735d6',
                'panorama' => '',
                'description' => 'Museum Fotografi adalah wisata kediri yang tempat koleksi kamera smartphone hingga kamera poket dan DSLR dan kamera jaman dulu juga foto-foto keadaan kota kediri jaman dulu.',
                'address' => 'Jalan Kapten Piere Tendean No.60/160, Ngronggo, Kediri, Jawa Timur 64127',
                'phone' => '0852-3577-9999',
                'year_built' => '2010',
                'latitude' => -7.84666,
                'longitude' => 112.0296, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum Mpu Purwa',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE_ZKyAZIFCgBqLZDur%2FBackground%2FBackground.jpg?alt=media&token=9e6657de-2da7-4f47-a23c-c889fb55de9d',
                'panorama' => '',
                'description' => 'Museum yang berisikan koleksi benda tentang peradaban Malang, terutama dari zaman masa Hindu-Budha',
                'address' => 'Jl. Soekarno Hatta Perumahan Griya Samta Blk. B No.210, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
                'phone' => '(0341) 404515',
                'year_built' => '2003',
                'latitude' => -7.9395,
                'longitude' => 112.6207, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum Seni Islam Indonesia',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE_Zwk5jVP-YjeLDqHU%2FBackground%2FBackground.jpg?alt=media&token=612a96c5-07f8-4196-b3d0-44e6a73f256a',
                'panorama' => '',
                'description' => 'Museum yang menampilkan informasi tentang sejarah islam di berbagai dunia juga menyimpan artefak-artefak islam.',
                'address' => 'Jl. Raya Paciran, Paciran, Kabupaten Lamongan, Jawa Timur 62264',
                'phone' => '0857-4840-5800',
                'year_built' => '28 Desember 2016',
                'latitude' => -6.8659,
                'longitude' => 112.3615, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => "Museum D'Topeng",
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE_Zz71fB8AJbj72qnG%2FBackground%2FBackground.jpg?alt=media&token=267b87ef-6c53-4d3b-9780-79d713e09c53',
                'panorama' => '',
                'description' => "D'Topeng Museum Angkut adalah salah satu tempat wisata berupa museum yang tidak hanya berisi topeng, tetapi juga barang tradisional dan barang antik yang terletak di Kota Batu, Jawa Timur",
                'address' => 'Jl. Sultan Agung No.2, Ngaglik, Kec. Batu, Kota Batu, Jawa Timur 65311',
                'phone' => '0821-4446-8002',
                'year_built' => '9 Maret 2014',
                'latitude' => -7.8831,
                'longitude' => 112.5250, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum TNI AL-Loka Jala Crana',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE__19MGD4r2lGyrY6J%2FBackground%2FBackground.jpg?alt=media&token=3e951808-a27f-46b3-a8df-3ff2691e35d3',
                'panorama' => '',
                'description' => 'Museum yang menampilkan  menampilkan benda-benda bersejarah yang telah dimiliki dan digunakan oleh Angkatan Laut Indonesia sejak era revolusi fisik.',
                'address' => 'Kobangdikal, Jalan Tanjung Emas, Morokrembangan, Krembangan, Kota SBY, Jawa Timur 60178',
                'phone' => '(031) 3291092',
                'year_built' => '19 September 1969',
                'latitude' => -7.2264,
                'longitude' => 112.7198, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum Mpu Tantular',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE__33xB99acqYQYmjn%2FBackground%2FBackground.jpg?alt=media&token=5af3ae51-934e-456f-bcda-c86eae51716d',
                'panorama' => '',
                'description' => 'Museum Mpu Tantular merupakan museum yang memeliki latar tentang sejarah provinsi Jawa Timur , mulai dari prasasti hingga aksara jawa terdapat di museum ini.',
                'address' => 'Jl. Raya Buduran - Jembatan Layang, Jl. Raden Moh. Mangundipi, Siwalanpanji, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61252',
                'phone' => '(031) 8056688',
                'year_built' => '25 Juli 1937',
                'latitude' => -7.4326,
                'longitude' => 112.7214, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum Kesehatan Dr. Arhyama MPH',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE__B9udkvNq8F8DLyZ%2FBackground%2FBackground.jpg?alt=media&token=807bd3b0-b109-4e67-a419-65db2aabd771',
                'panorama' => '',
                'description' => 'Museum kesehatan & pengobatan, berisi berbagai keyakinan genetik hingga budaya tentang penyembuhan.',
                'address' => 'Jl. Indrapura No.17, Kemayoran, Krembangan, Kota SBY, Jawa Timur 60176',
                'phone' => '(031) 3528748',
                'year_built' => '14 September 2004',
                'latitude' => -7.2394,
                'longitude' => 112.7333, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
            [  
                'name' => 'Museum Brawijaya',
                'background' => 'https://firebasestorage.googleapis.com/v0/b/digimu-31cdd.appspot.com/o/-LE__FOjXpxb_jcr7rso%2FBackground%2FBackground.JPG?alt=media&token=945a0109-5c88-41f8-a4b1-8f276de21e4b',
                'panorama' => '',
                'description' => 'Artefak & pameran tentang perjuangan rakyat Indonesia menggapai kemerdekaan, termasuk senjata & tank militer.',
                'address' => 'Jl. Ijen No.25 A, Gading Kasri, Klojen, Kota Malang, Jawa Timur 65115',
                'phone' => '(0341) 562394',
                'year_built' => '16 April 1968',
                'latitude' => -7.9715,
                'longitude' => 112.6216, 
                'price' => $this->faker->numberBetween($min = 15000, $max = 50000),
            ],
        ];
    DB::table('museums')->insert($data);
    }
}
