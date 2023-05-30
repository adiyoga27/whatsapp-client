<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::query()->find(1)->update([
            'web_name' => 'Pt. Varash Saddan Investama',
            'sub_web_name' => 'Sebuah Pengobatan Warisan Nusantara',
            'store_address' => 'JALAN AHMAD YANI UTARA SRITI RESIDENCE NO. 88 DENPASAR, BALI',
            'maps' => 'location',
            'email' => 'example@gmail.com',
            'phone_cs_1' => '088123001923',
            'whatsapp' => '626223009789',
            'template' => 'theme-1',
            'section_name_3' => 'PRODUK VARIATIF',
            'section_title_3' => 'Beragam Produk Terbaik',
            'section_description_3' => 'Kami selalu terdepan dalam melakukan inovasi terkait produk tradisional yang dibutuhkan masyarakat.
            ',
            'section1_img' => 'default.jpg',
            'tagline_section' => 'Gunakan Minyak Varash Untuk Kesehatan Yang Lebih Baik',
        ]);
    }
}
