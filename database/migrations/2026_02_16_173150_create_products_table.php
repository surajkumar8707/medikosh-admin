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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('batch')->nullable();
            $table->date('mfg_date')->nullable();
            $table->date('exp_date')->nullable();
            $table->string('manufacturer')->nullable();
            $table->longText('description')->nullable();
            $table->longText('order_url')->nullable();
            // $table->string('key_ingredients')->nullable();
            // $table->string('benefits')->nullable();
            $table->string('price')->nullable();
            $table->string('certifications')->nullable();
            $table->string('slug')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            // $table->string('image')->nullable();
            $table->enum('is_verified', ['1', '0'])->default('1');
            $table->enum('status', ['1', '0'])->default('1');
            $table->enum('product_type', ['0', '1'])->default('0');
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
