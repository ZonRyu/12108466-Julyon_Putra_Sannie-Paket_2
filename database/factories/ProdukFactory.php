<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_produk' => $this->faker->name(),
            'harga_produk' => $this->faker->randomNumber('1', '1000000'),
            'stok_produk' => $this->faker->randomNumber('1', '100'),
            'foto_produk' => Str::random(10),
        ];
    }
}
