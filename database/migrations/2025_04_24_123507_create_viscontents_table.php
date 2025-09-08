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
        Schema::create('viscontents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prod_id');
            $table->string('filename');
            $table->string('alt_desc');
            $table->timestamps();

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
        Schema::dropIfExists('viscontents');
    }
};
