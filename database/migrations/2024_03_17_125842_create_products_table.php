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
            $table->string('name');
            $table->string('slug');
            $table->text('short_desc');
            $table->float('regular_price');
            $table->float('sale_price');
            $table->integer('quantity');
            $table->text('description');
            $table->tinyInteger('trending')->default(0)->comment('1=trending, 0=not trending');
            $table->tinyInteger('featured')->default(0)->comment('1=featured, 0=not featured');
            $table->tinyInteger('best_seller')->default(0)->comment('1=best seller, 0=not best seller');
            $table->tinyInteger('status')->default(0)->comment('1=hidden, 0=visible');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('manufacturer_id'); // Đổi kiểu dữ liệu thành unsignedBigInteger
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
