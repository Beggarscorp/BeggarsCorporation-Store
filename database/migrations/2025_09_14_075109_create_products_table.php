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
        $table->timestamps();
        $table->string('product_name');
        $table->string('slug')->unique();
        $table->text('description')->nullable();
        $table->decimal('price', 8, 2);
        $table->text('size_and_fit')->nullable();
        $table->text('material_and_care')->nullable();
        $table->text('specification')->nullable();
        $table->unsignedBigInteger('product_color_id');
        $table->unsignedBigInteger('category_id');
        $table->string('impact_product_by')->nullable();
        $table->integer('stock')->default(0);
        $table->integer('min_order_quantity')->default(1);
        $table->string('productImage')->nullable();
        $table->json('productGalleryImages')->nullable();

        // Optional: foreign keys
        // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        // $table->foreign('product_color_id')->references('id')->on('product_colors')->onDelete('cascade');
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
