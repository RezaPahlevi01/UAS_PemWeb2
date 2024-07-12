<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'restorant_id',
        'kriteria_id',
        'nilai'
    ];

    public function restorant()
    {
        return $this->belongsTo(Restorant::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
