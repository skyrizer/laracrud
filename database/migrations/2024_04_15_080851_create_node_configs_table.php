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
        Schema::create('node_configs', function (Blueprint $table) {
            $table->unsignedBigInteger('config_id');
            $table->unsignedBigInteger('node_id');

            $table->primary(['config_id', 'node_id']);

            // Define foreign key constraint for container_id
            $table->foreign('config_id')->references('id')->on('configs');
            $table->foreign('node_id')->references('id')->on('nodes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('node_configs');
    }
};
