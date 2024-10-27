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
        Schema::table('past_rent_movie_user_link', function (Blueprint $table) {
            DB::table('past_rent_movie_user_link')->delete();
            $table->tinyInteger('rating')->nullable();
            $table->unique(['user_id', 'movie_id'], 'NoDuplicates');
            // index para tornar o cálculo da média mais eficiente
            $table->index('movie_id', 'movie_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('past_rent_movie_user_link', function (Blueprint $table) {
            $table->dropColumn('rating');

            $table->dropForeign('past_rent_movie_user_link_user_id_foreign');

            $table->dropForeign('past_rent_movie_user_link_movie_id_foreign');
            $table->dropIndex('movie_id');
            $table->dropUnique('NoDuplicates');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');

        });
    }
};
