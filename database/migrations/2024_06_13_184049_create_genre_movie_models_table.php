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
        Schema::create('genre_movie_model', function (Blueprint $table) {
            $table->unsignedBiginteger('genre_id');
            $table->unsignedBiginteger('movie_model_id');

            $table->foreign('genre_id')->references('id')
            ->on('genres')->onDelete('cascade');
            $table->foreign('movie_model_id')->references('id')
                 ->on('movie_model')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre_movie_models');
    }
};
