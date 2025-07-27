<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('cv')->nullable();
            $table->text('herotext')->nullable();
            $table->text('bio')->nullable();
            $table->string('photo')->nullable();
            $table->string('numero')->nullable();
            $table->string('email')->nullable();
            $table->string('localisation')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
