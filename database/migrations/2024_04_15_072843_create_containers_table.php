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
        Schema::create('containers', function (Blueprint $table) {
            $table->string('id')->unique(); // Make 'id' unique but not auto-incrementing
            $table->string('name')->primary;
            $table->string('image');
            $table->string('created');
            $table->string('status');
            $table->string('port');
            $table->integer('disk_limit');
            $table->integer('mem_limit');
            $table->integer('net_limit');
            $table->integer('cpu_limit');
            $table->unsignedBigInteger('node_id'); // Add the node_id column
            $table->foreign('node_id')->references('id')->on('nodes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('containers');
    }
};

