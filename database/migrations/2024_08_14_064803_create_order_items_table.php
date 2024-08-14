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
        Schema::create('order_items', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained(
                table: 'orders', indexName: 'order_order_idx_id'
            );
            $table->foreignId('product_id')->constrained(
                table: 'products', indexName: 'product_order_idx_id'
            );
            $table->index(['order_id', 'product_id']);
            $table->primary(['order_id', 'product_id']);
            $table->string(column: 'name');
            $table->integer(column: 'price');
            $table->integer(column: 'quantity');
            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
