<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Produk::factory(10)->create();

        \App\Models\User::factory()->create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'Admin',
        ]);


        \App\Models\Produk::factory()->create([
            'nama_produk' => 'Nasi Padang',
            'harga_produk' => '20000',
            'stok_produk' => '100',
            'foto_produk' => 'nasi padang.jpeg',
        ]);
        \App\Models\Produk::factory()->create([
            'nama_produk' => 'Nasi Kebuli',
            'harga_produk' => '15000',
            'stok_produk' => '150',
            'foto_produk' => 'nasi kebuli.jpeg',
        ]);
        \App\Models\Produk::factory()->create([
            'nama_produk' => 'Burger',
            'harga_produk' => '10000',
            'stok_produk' => '50',
            'foto_produk' => 'burger.jpeg',
        ]);
        \App\Models\Produk::factory()->create([
            'nama_produk' => 'Bakso',
            'harga_produk' => '15000',
            'stok_produk' => '20',
            'foto_produk' => 'bakso.jpeg',
        ]);
        \App\Models\Produk::factory()->create([
            'nama_produk' => 'Makaroni Keju',
            'harga_produk' => '10000',
            'stok_produk' => '60',
            'foto_produk' => 'mac n cheese.jpeg',
        ]);
        \App\Models\Produk::factory()->create([
            'nama_produk' => 'Spageti',
            'harga_produk' => '17000',
            'stok_produk' => '40',
            'foto_produk' => 'spageti.jpeg',
        ]);
        \App\Models\Produk::factory()->create([
            'nama_produk' => 'Es Buah',
            'harga_produk' => '12000',
            'stok_produk' => '35',
            'foto_produk' => 'es buah.jpeg',
        ]);
        \App\Models\Produk::factory()->create([
            'nama_produk' => 'Es Podeng',
            'harga_produk' => '7000',
            'stok_produk' => '80',
            'foto_produk' => 'es podeng.jpeg',
        ]);
        \App\Models\Produk::factory()->create([
            'nama_produk' => 'Es Krim',
            'harga_produk' => '5000',
            'stok_produk' => '40',
            'foto_produk' => 'es krim.jpeg',
        ]);
        \App\Models\Produk::factory()->create([
            'nama_produk' => 'Air Mineral',
            'harga_produk' => '5000',
            'stok_produk' => '100',
            'foto_produk' => 'air.jpeg',
        ]);
    }
}
