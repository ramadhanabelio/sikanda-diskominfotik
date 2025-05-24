<?php

namespace Database\Seeders;

use App\Models\SubSubtitle;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubSubtitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sub_subtitles = [
            'Belanja Alat/Bahan untuk Kegiatan Kantor Benda Pos',
            'Belanja Makanan dan Minuman Rapat',
            'Belanja Kawat/Faksimili/Internet/TV Berlangganan',
            'Belanja Pemeliharaan Komputer-Peralatan Komputer-Peralatan Mainframe',
            'Belanja Perjalanan Dinas Biasa'
        ];

        foreach ($sub_subtitles as $sub_sub_judul) {
            SubSubtitle::create(['sub_sub_judul' => $sub_sub_judul]);
        }
    }
}
