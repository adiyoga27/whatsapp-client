<?php

namespace Database\Factories;

use App\Models\Whatsapp;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Whatsapp>
 */
class WhatsAppFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Whatsapp::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'url' => $this->faker->url,
            'is_active' => 1,
        ];
    }
}
