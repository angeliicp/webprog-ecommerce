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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id('rate_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('prod_id');
            $table->decimal('rating', 3, 2);
            $table->text('review')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('prod_id')->references('prod_id')->on('products')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
