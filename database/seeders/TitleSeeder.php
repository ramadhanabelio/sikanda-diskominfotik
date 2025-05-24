<?php

namespace Database\Seeders;

use App\Models\Title;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Title::create([
            'judul' => 'Penyediaan Layanan Keamanan Informasi Pemerintah Daerah Provinsi',
        ]);
    }
}
