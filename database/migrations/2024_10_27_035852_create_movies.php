<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration {
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('gender_movie');
            $table->timestamps();
            $table->string('image_type')->nullable();

        });

        DB::statement('ALTER TABLE movies ADD image LONGBLOB NULL');
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
