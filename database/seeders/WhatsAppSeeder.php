<?php

namespace Database\Seeders;

use App\Models\Whatsapp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhatsAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Whatsapp::factory()->count(10)->make()->each->save();
    }
}
