<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;


    public function commandes()
    {
        return $this->belongsToMany(Commande::class);
    }


    public function souscategorie()
    {
        return $this->belongsTo(Souscategorie::class);
    }

    public function commentaires()
   	{
       	 	return $this->hasMany(Commentaire::class);
    }








    protected $fillable = [
        'nom_produit','description','prix','quantite','souscategorie_id'
    ];

}
