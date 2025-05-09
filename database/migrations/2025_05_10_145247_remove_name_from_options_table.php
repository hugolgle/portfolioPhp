<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('options', function (Blueprint $table) {
            $table->dropColumn('name');  // Suppression de la colonne 'name'
        });
    }

    public function down()
    {
        Schema::table('options', function (Blueprint $table) {
            $table->string('name');  // Ajouter la colonne 'name' si besoin
        });
    }

};
