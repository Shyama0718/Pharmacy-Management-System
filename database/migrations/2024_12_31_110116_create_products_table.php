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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Product name
            // $table->text('description')->nullable(); 
            $table->decimal('price', 10, 2); // Price with two decimal places
            $table->date('mfg_date'); // Manufacturing date
            $table->date('expiry_date')->nullable(); // Expiry date
            $table->string('image')->nullable(); // Image file path
            $table->timestamps(); 
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
