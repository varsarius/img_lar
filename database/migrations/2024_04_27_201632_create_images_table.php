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
        Schema::create('images', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('location_id')->nullable();
          $table->string('name');
          $table->text('description')->nullable(); // переделать string на text
          //$table->string('location');
          $table->date('date')->nullable();
          $table->string('path');
          $table->boolean('is_verified')->default(0);
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
