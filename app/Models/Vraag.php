<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FaqCategorie;

class Vraag extends Model
{
    use HasFactory;

    protected $table = 'vragen'; // <- Isso resolve o erro!

    protected $fillable = ['vraag', 'antwoord', ];

   public function categorie()
{
    return $this->belongsTo(FaqCategorie::class);
}

}
