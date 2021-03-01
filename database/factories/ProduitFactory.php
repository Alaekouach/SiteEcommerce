<?php

namespace Database\Factories;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nom_produit' => $this->faker->name,
            'description' => $this->faker->text,
            'prix' => $this->faker->randomDigit,
            'quantite' => $this->faker->randomDigit,
            'souscategorie_id' => $this->faker->text,

        ];
    }
}
