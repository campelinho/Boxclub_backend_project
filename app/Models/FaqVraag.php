<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqVraag extends Model
{
    use HasFactory;

    protected $table = 'vragen'; 

    protected $fillable = [
        'vraag',
        'antwoord',
        
    ];

    public function categorie()
    {
        return $this->belongsTo(FaqCategorie::class, );
    }
}
