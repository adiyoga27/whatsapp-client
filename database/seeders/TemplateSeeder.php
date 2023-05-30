<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 13; $i++) {
            Template::create([
                'name' => 'theme-' . $i + 1,
                'thumbnail' => 'default.jpg',
                'is_active' => 1
            ]);
        }
    }
}
