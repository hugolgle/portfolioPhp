<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevisTable extends Migration
{
    public function up()
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->id();
            $table->json('services'); // Tableau de services avec un nom et un tableau d'options
            $table->string('client_name'); // Nom du client
            $table->string('client_phone'); // Numéro de téléphone du client
            $table->string('client_email'); // Email du client
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('devis');
    }
}

