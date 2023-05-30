<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\ArticleCategories;
use App\Models\Book;
use App\Models\BookCategories;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Profile;
use App\Models\SocialMedia;
use App\Models\Testimonial;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        User::create([
            'full_name' => "Admin Galkasoft",
            'phone' => '088123321008',
            'username' => 'Galkasoft',
            'level' => 'superadmin',
            'email' => 'landinggalkasoft@gmail.com',
            'password' => Hash::make('superadmin123'),
            'email_verified_at' => Carbon::now()
        ]);



        SocialMedia::create([
            'facebook' => '@example',
            'instagram' => '@example',
            'email' => 'example@gmail.com',
            'twitter' => '@example',
            'is_active' => '1',
            'youtube' => 'youtube.com',
        ]);

        // for ($i = 0; $i < 10; $i++) {
        //     Book::create([
        //         'title' => 'Book ' . $i,
        //         'category_id' => $faker->numberBetween(1, 10),
        //         'price' => 200000,
        //         'description' => $faker->text(200),
        //         'image' => 'assets/images/default.png',
        //         'is_active' => $faker->numberBetween(0, 1)

        //     ]);
        // }

        // for ($i = 0; $i < 10; $i++) {
        //     BookCategories::create([
        //         'name' => 'Category ' . $i,
        //         'is_active' => $faker->numberBetween(0, 1)
        //     ]);
        // }

        for ($i = 0; $i < 10; $i++) {
            Article::create([
                'category_id' => $faker->numberBetween(1, 10),
                'user_id' => 1,
                'title' => 'Article Rekomendasi Buku untuk Persiapan Skripsi',
                'description' => $faker->text(200),
                'image' => 'default.png',
                'is_active' => 1,
                'slug' => Str::slug('Article Rekomendasi Buku untuk Persiapan Skripsi') . '-' . Str::random(3),
                'keyword' => 'article terbaru'
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            ArticleCategories::create([
                'name' => 'Category ' . $i,
                'is_active' => 1
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'category_id' => $faker->numberBetween(1, 10),
                'name' => 'Product Varash',
                'price' => 300000,
                'image' => 'assets/images/default.png',
                'description' => 'lorem lorem lorem',
                'is_active' => 1,
                'slug' => Str::slug('Product Varash') . '-' . Str::random(3),
                'keyword' => 'varash',
                'variant_id' => 1
            ]);
        }


        for ($i = 0; $i < 10; $i++) {
            ProductCategory::create([
                'name' => 'Category ' . $i,
            ]);
        }

        Testimonial::factory()->count(10)->make()->each->save();
    }
}
