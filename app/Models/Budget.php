<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_anggaran',
        'judul',
        'sub_judul',
        'sub_sub_judul',
        'uraian',
        'pejabat_penanggung_jawab',
        'waktu_pelaksanaan',
        'volume',
        'satuan',
        'harga_satuan',
        'jumlah_anggaran',
        'bobot',
        'volume_nominal_rr',
        'satuan_rr',
        'fisik_rr',
        'tertimbang_rr',
        'volume_nominal_rf',
        'satuan_rf',
        'fisik_rf',
        'tertimbang_rf',
        'rupiah_rk',
        'persentase_rk',
        'tertimbang_rk',
        'sisa_anggaran',
    ];
}
