<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeProduit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_produit', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('commande_id');
            $table->foreign('commande_id')
                ->references('id')
                ->on('commandes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
    
                $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')
                ->references('id')
                ->on('produits')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande_produit');
    }
}
