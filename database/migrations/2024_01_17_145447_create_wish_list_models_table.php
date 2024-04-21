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
        Schema::create('wish_list_models', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger("user_id");
            $table->string('media_type');
            $table->string('poster_path');
            $table->string('release_date');
            $table->string('title');
            $table->tinyInteger('vote_average');
            $table->string('slug');
            $table->foreign("user_id")->references("id")->on('users')->onDelete('cascade');;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wish_list_models');
    }
};
