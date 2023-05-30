<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreExpeditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::query()->create([
            'provice_id' => 1,
            'province_name' => 'Bali',
            'city_id' => 17,
            'city_name' => 'Kabupaten Badung',
            'subdistrict_id' => 258,
            'subdistrict_name' => 'Abiansemal',
            'store_address' => null,
            'take_to_store' => 0
        ]);
    }
}
