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
        if (!Schema::hasTable('manus')) {
        Schema::create('manus', function (Blueprint $table) {
            $table->id();
            $table->string('dishname');
            $table->string('discription');
            $table->float('price',precision: 53);
            $table->string('category');
            $table->string('image');
            $table->integer('rating');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manus');
    }
};
