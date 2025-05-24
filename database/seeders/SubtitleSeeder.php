<?php

namespace Database\Seeders;

use App\Models\Subtitle;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubtitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subtitle::create([
            'sub_judul' => 'Operasional Jaring Komunikasi Sandi Daerah Provinsi Riau',
        ]);
    }
}
