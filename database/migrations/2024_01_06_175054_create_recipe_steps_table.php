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
        Schema::create('recipe_steps', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 512)->nullable();
            $table->time('estimated_time');
            $table->unsignedInteger('step_number');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('recipe_id');
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_steps');
    }
};
