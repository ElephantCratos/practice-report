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
        Schema::create('score', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('name', 255);
        });

        Schema::create('troubles', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->foreignId('score_id')->references('id')->on('score');
        });

        Schema::create('volume', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->foreignId('score_id')->references('id')->on('score');
        });

        Schema::create('traits', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->foreignId('score_id')->references('id')->on('score');
        });


        Schema::create('student_practice', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('practice_id');
            $table->unsignedBigInteger('student_id');
            $table->boolean('paid')->default(false);
            $table->unsignedBigInteger('contract_type_id');
            $table->unsignedBigInteger('practice_head_organization_id');
            $table->foreignId('volume_id')->references('id')->on('volume');
            $table->foreignId('traits_id')->references('id')->on('traits');
            $table->timestamps();

            //топ тело топ лицо
            $table->foreignId('trouble_id')->references('id')->on('troubles');
            $table->foreignId('score_id')->references('id')->on('score');


        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->date('date');
            $table->foreignId('student_practice_id')->references('id')->on('student_practice');

        });

        Schema::create('reprimand', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->foreignId('student_practice_id')->references('id')->on('student_practice');
        });

        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_practice');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('reprimand');
        Schema::dropIfExists('troubles');
        Schema::dropIfExists('score');
        Schema::dropIfExists('volume');
        Schema::dropIfExists('traits');
    }
};
