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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 512)->nullable();
            $table->unsignedBigInteger('ingredient_category_id')->nullable();
            $table->foreign('ingredient_category_id')->references('id')->on('ingredient_categories')->onDelete('set null');
            $table->decimal('price', 8, 2)->default(0);
            $table->decimal('owned_amount', 8, 2)->default(0);
            $table->string('unit', 8)->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
