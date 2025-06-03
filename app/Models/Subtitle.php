<?php

namespace App\Models;

use App\Models\Title;
use App\Models\SubSubtitle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subtitle extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_judul',
        'title_id',
    ];

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function subSubtitles()
    {
        return $this->hasMany(SubSubtitle::class);
    }
}
