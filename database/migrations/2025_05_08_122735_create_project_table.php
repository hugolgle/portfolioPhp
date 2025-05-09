<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('projects', function (Blueprint $table) {
      $table->id();
      $table->string('formation');
      $table->string('title');
      $table->string('objectif');
      $table->longText('description');
      $table->json('skills');
      $table->json('ressource');
      $table->json('tags');
      $table->string('image');
      $table->timestamps();
    });
  }


  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('projects');
  }
};
