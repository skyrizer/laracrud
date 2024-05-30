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
        Schema::create('node_services', function (Blueprint $table) {

            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('node_id');


            $table->primary(['service_id', 'node_id']);

            // Define foreign key constraint for container_id
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('node_id')->references('id')->on('nodes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('node_services');
    }
};
