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
        Schema::create('disk_usages', function (Blueprint $table) {
              // Define container_id and dateType as primary keys
              $table->string('container_id');
              $table->dateTime('dateTime');
              $table->primary(['container_id', 'dateTime']);
  
              // Define foreign key constraint for container_id
              $table->foreign('container_id')->references('container_id')->on('containers');
  
              // Add value column
              $table->string('input');
              $table->string('output');

  
              $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disk_usages');
    }
};
