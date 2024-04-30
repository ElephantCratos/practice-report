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
        Schema::create('practices_practice_places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('practice_id');
            $table->unsignedBigInteger('practice_places_id');

            $table->timestamps();

            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            $table->foreign('practice_places_id')->references('id')->on('practice_places')->onDelete('cascade');


        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practices_practice_places');
    }
};
