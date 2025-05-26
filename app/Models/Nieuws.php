<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nieuws extends Model
{
    use HasFactory;

    protected $fillable = [
        'titel',
        'inhoud',
        'publicatiedatum',
        'afbeelding',
    ];
}
