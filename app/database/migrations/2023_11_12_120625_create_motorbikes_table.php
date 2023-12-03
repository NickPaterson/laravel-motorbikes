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
        Schema::create('motorbikes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('category_id')->default(1);
            $table->string('title');
            $table->text('description');
            $table->text('summary');
            $table->string('make');
            $table->string('model');
            $table->integer('engine');
            $table->integer('year');
            $table->integer('price');
            $table->string('slug')->unique();
            $table->string('thumbnail_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorbikes');
    }
};
