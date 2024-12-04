<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('courier_id')->default(0);
            $table->string('status')->default(0);
            $table->decimal('total_price', 10, 2);
            $table->decimal('delivery_fee', 10, 2)->nullable();
            $table->string('payment_method')->default('cash');
            $table->string('delivery_address');
            $table->timestamp('delivery_time')->nullable();
            $table->string('delivery_status')->default('pending');
            $table->text('order_notes')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('courier_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
