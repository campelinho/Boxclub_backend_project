<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategorie extends Model
{
    use HasFactory;

    protected $table = 'faq_categorieën'; // <- ESSENCIAL!

    protected $fillable = ['naam'];

    // 🔧 Aqui está o que faltava
    public function vragen()
    {
        return $this->hasMany(FaqVraag::class, 'categorie_id');
    }
}
