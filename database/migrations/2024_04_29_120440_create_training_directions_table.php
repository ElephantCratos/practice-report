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
        Schema::create('training_directions', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->foreignId('head_OPOP_id')->references('id')->on('users');
            $table->foreignId('institute_id')->references('id')->on('instituts');



            $table->timestamps();
        });

        Schema::table('groups', function (Blueprint $tableGroup) {
            $tableGroup->foreignId('training_direction_id')->nullable()->references('id')->on('training_directions');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_directions');
    }
};
