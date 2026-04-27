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
    Schema::create('tutorial_details', function (Blueprint $table) {
        $table->id();
        $table->foreignId('tutorial_id')->constrained()->cascadeOnDelete();
        $table->enum('type', ['text','image','code','url']);
        $table->enum('status', ['show','hide'])->default('hide');
        $table->unsignedInteger('step_order'); 
        
        $table->text('content')->nullable();   
        $table->string('image_path')->nullable();
        $table->string('caption')->nullable();
        $table->string('language')->nullable(); 
        $table->string('url')->nullable();     

        $table->timestamps();
        $table->index(['tutorial_id', 'step_order']);
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutorial_details');
    }
};
