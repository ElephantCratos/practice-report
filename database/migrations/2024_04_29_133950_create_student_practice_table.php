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



        Schema::create('troubles', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->foreignId('score_id')->references('id')->on('score');
            $table->timestamps();
        });


        Schema::create('volume', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->foreignId('score_id')->references('id')->on('score');
            $table->timestamps();
        });


        Schema::create('traits', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->foreignId('score_id')->references('id')->on('score');
            $table->timestamps();
        });


        //Поменять unsignedBigInt на foreignId как появятся соответствующие модели и миграции
        Schema::create('student_practice', function (Blueprint $table) {
            $table->id();


            $table->foreignId('student_id')->references('id') ->on('users');

            $table->boolean('paid')->default(false);

            $table->foreignId('contract_type_id')->nullable()->references('id')->on('contract_type');

            $table->foreignId('practice_head_organization_id')->references('id') ->on('users');

            $table->foreignId('volume_id')->nullable()->references('id')->on('volume');

            $table->foreignId('traits_id')->nullable()->references('id')->on('traits');

            $table->foreignId('trouble_id')->nullable()->references('id')->on('troubles');

            $table->foreignId('score_id')->nullable()->references('id')->on('score');

            $table->string('reprimand')->nullable();

            $table->foreignId('practice_place')->nullable()->references('id')->on('practice_places');

            $table->boolean('isReady') -> default(false);

            $table->timestamps();


        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->date('date');
            $table->foreignId('student_practice_id')->references('id')->on('student_practice');
            $table->timestamps();

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
