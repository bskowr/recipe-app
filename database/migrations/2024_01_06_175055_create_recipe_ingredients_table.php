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
        Schema::create('recipe_ingredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recipe_step_id');
            $table->foreign('recipe_step_id')
                ->references('id')
                ->on('recipe_steps')
                ->onDelete('cascade');
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id')
                ->references('id')
                ->on('ingredients')
                ->onDelete('no action');
            $table->decimal('amount_used', 8, 2, true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_ingredients');
    }
};
