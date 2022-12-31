<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Supplier::factory(5)->create();
        \App\Models\Toko::factory(5)->create();
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);
        \App\Models\Kategori::factory()->create([
            'nama_kategori' => 'Kategori Pertama',
        ]);
        \App\Models\Kategori::factory()->create([
            'nama_kategori' => 'Kategori Kedua',
        ]);
        \App\Models\Kategori::factory()->create([
            'nama_kategori' => 'Kategori Ketiga',
        ]);
    }
}
