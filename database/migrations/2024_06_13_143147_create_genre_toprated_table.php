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
        Schema::create('genre_top_rated', function (Blueprint $table) {
            $table->unsignedBiginteger('genre_id');
            $table->unsignedBiginteger('top_rated_id');

            $table->foreign('genre_id')->references('id')
            ->on('genres')->onDelete('cascade');
            $table->foreign('top_rated_id')->references('id')
                 ->on('top_rated')->onDelete('cascade');
;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre_toprated');
    }
};
