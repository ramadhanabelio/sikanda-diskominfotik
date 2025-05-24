<?php

namespace Database\Seeders;

use App\Models\Description;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $descriptions = [
            'Materai',
            'Pengadaan Makanan dan Minuman Jamuan/Uang Makan/Kudapan (Snack) Acara di Kantor Spesifikasi: Kudapan (Snack)',
            'Office 365\nSpesifikasi: Microsoft Office 365 Original',
            'Windows\nSpesifikasi: Microsoft Windows 11 Profesional 32bit/64bit',
            'Pemeliharaan Dana Perbaikan Alat Pendukung Utama (APU)\nSpesifikasi: Pemeliharaan dan Perbaikan Alat Pendukung Utama (APU)',
            'Biaya Taksi Perjalanan Dinas Dalam Negeri\nSpesifikasi: D.K.I Jakarta',
            'Biaya Taksi Perjalanan Dinas Dalam Negeri \nSpesifikasi: Riau',
            'Penginapan Perjalanan Dinas Luar Daerah (Pejabat Eselon IIV/JFU & JFT Golongan IV)\nSpesifikasi: D.K.I Jakarta',
            'Uang Harian Perjalanan Dinas Luar Daerah\nSpesifikasi: D.K.I Jakarta',
            'Uang Transportasi Udara (PP) - Ekonomi\nSpesifikasi: D.K.I Jakarta'
        ];

        foreach ($descriptions as $uraian) {
            Description::create(['uraian' => $uraian]);
        }
    }
}
