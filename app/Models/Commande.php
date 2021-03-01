<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function produits()
    {
        return $this->belongsToMany(Produit::class);
    }






    protected $fillable = [
        'prix_total','user_id'
    ];

}
