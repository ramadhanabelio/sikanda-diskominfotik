<?php

namespace App\Models;

use App\Models\Subtitle;
use App\Models\Description;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubSubtitle extends Model
{
    use HasFactory;

    protected $fillable = [
        'subtitle_id',
        'sub_sub_judul',
    ];

    public function subtitle()
    {
        return $this->belongsTo(Subtitle::class);
    }

    public function descriptions()
    {
        return $this->hasMany(Description::class);
    }
}
