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
        Schema::rename('projects', 'old_projects');

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('ressource')->nullable();
            $table->json('tags')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // Copier les données utiles
        DB::table('projects')->insert(
            DB::table('old_projects')->select('id', 'title', 'description', 'ressource', 'tags', 'image', 'created_at', 'updated_at')->get()->map(function ($item) {
                return (array) $item;
            })->toArray()
        );

        Schema::drop('old_projects');
    }

};
