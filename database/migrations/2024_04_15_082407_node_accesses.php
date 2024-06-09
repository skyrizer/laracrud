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
        Schema::create('node_accesses', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('node_id')->nullable(); // Make node_id nullable
    
            // Define unique constraint instead of primary key
            $table->unique(['role_id', 'user_id', 'node_id']);
    
            // Define foreign key constraint for role_id, user_id, and node_id
            $table->foreign('role_id')->references('id')->on('user_roles');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('node_id')->references('id')->on('nodes'); 
    
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('node_accesses');
    }
};
