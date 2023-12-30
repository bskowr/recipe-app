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
        Schema::create('ingredient', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 512);
            $table->unsignedBigInteger('ingredient_category_id');
            $table->foreign('ingredient_category_id')->references('id')->on('ingredient_category')->onDelete('no action');
            $table->decimal('price', 8, 2);
            $table->decimal('owned_amount', 8, 2);
            $table->string('unit', 8)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient');
    }
};
