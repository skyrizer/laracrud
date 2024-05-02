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
        Schema::create('http_responses', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->integer('status_code');
            $table->unsignedBigInteger('node_id')->nullable(); // Nullable foreign key
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('node_id')->references('id')->on('nodes')->onDelete('set null'); // Assuming 'nodes' is the referenced table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('http_responses');
    }
};
