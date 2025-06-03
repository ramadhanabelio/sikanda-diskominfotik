<?php

namespace App\Models;

use App\Models\Subtitle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Title extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
    ];

    public function subtitles()
    {
        return $this->hasMany(Subtitle::class);
    }
}
