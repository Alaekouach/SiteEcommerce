<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souscategorie extends Model
{
    use HasFactory;

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }

    public function categorie()
    {
        return $this->belongsto(Categorie::class);
    }








    protected $fillable = [
        'intitule_souscategorie','categorie_id'
    ];
}
