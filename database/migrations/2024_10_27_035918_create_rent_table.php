<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// links from the user to the movies rented, with soft deletes, timestamps and id

return new class extends Migration {
    public function up(): void
    {
        Schema::create('current_rent_movie_user_link', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('movie_id')->constrained()->onDelete('cascade');
            $table->unique(['user_id', 'movie_id'], 'NoDuplicates');
            $table->timestamps();
        });
        Schema::create('past_rent_movie_user_link', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('movie_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('current_rent_movie_user_link');
        Schema::dropIfExists('past_rent_movie_user_link');

    }
};
