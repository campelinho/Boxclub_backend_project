<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqVraag extends Model
{
    use HasFactory;

    protected $fillable = [
        'faq_categorie_id',
        'vraag',
        'antwoord',
    ];

    public function categorie()
    {
        return $this->belongsTo(FaqCategorie::class, 'faq_categorie_id');
    }
}
