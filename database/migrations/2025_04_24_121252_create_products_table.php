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
        Schema::create('products', function (Blueprint $table) {
            $table->id('prod_id');
            $table->string('prod_name');
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->string('top_notes');
            $table->string('mid_notes');
            $table->string('base_notes');
            $table->string('concentration');
            $table->string('fragrance_gender');
            $table->string('age_group');
            $table->string('keyword');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
