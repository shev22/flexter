<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movie_models', function (Blueprint $table) {
       
            $table->string('backdrop_path')->nullable();;

            // $table->string('logo')->nullable();;
            $table->json('genre_ids')->nullable();
            $table->unsignedBigInteger('id');
            $table->string('original_language')->nullable();
            $table->longText ('overview')->nullable();
            $table->string('popularity')->nullable();
            $table->string('poster_path')->nullable();
            $table->string('release_date')->nullable();
            $table->string('title')->nullable();
            $table->string('vote_average')->nullable();
            $table->string('vote_count')->nullable();
            $table->string('slug');
            $table->string('year')->nullable();
            $table->string('media_type');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_models');
    }
};
