<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cpu_usages', function (Blueprint $table) {
            // Define container_id and dateType as primary keys
            $table->unsignedBigInteger('container_id');
            $table->dateTime('dateType');
            $table->primary(['container_id', 'dateType']);

            // Define foreign key constraint for container_id
            $table->foreign('container_id')->references('id')->on('containers');

            // Add value column
            $table->integer('value');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpu_usages');
    }
};
