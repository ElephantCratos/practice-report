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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->timestamps();
        });

        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->foreignId('course_id')->nullable()->references('id')->on('courses');

            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $tableUser) {
        $tableUser->foreignId('group_id')->nullable()->references('id')->on('groups');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
        Schema::dropIfExists('groups');
    }
};
