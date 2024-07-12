<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restorant extends Model
{
    use HasFactory;
    
    protected $table = 'restorants';

    protected $fillable = [
        'nama', 'code_alternatif'
    ];
}