<?php

namespace App\Models;

use App\Models\SubSubtitle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Description extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_subtitle_id',
        'uraian',
    ];

    public function subSubtitle()
    {
        return $this->belongsTo(SubSubtitle::class);
    }
}
