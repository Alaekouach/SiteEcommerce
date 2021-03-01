<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom_produit');
            $table->longText('description');
            $table->string('marque');
            $table->unsignedBigInteger('prix');
            $table->unsignedBigInteger('quantite');
            $table->text('photo_produit');


            $table->unsignedBigInteger('souscategorie_id');
            $table->foreign('souscategorie_id')
                ->references('id')
                ->on('souscategories')
                ->onDelete('restrict')
                ->onUpdate('restrict');

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
        Schema::dropIfExists('produits');
    }
}
