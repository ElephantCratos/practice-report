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
        Schema::create('practices', function (Blueprint $table) {
            $table->id();
            $table->text('practice_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('order_number');
            $table->date('order_date');
            $table->foreignId('group_id')->references('id')->on('groups');
            $table->foreignId('practice_head_ugrasu_id')->references('id')->on('users');
            $table->foreignId('practice_head_enterprice_id')->references('id')->on('users');
            $table->foreignId('practice_sort_id')->references('id')->on('practice_sort');
            $table->foreignId('practice_type_id')->references('id')->on('practice_type');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practices');
    }
};
