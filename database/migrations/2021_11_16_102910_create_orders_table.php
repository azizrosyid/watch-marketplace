<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('store_id');
            $table->string('payment_method');
            $table->string('shipment_method');
            $table->string('total_price')->nullable();
            $table->enum('status', ['UNPAID', 'PAID', 'PENDING', 'ON_DELIVERY', 'DELIVERED'])->default('UNPAID');
            $table->string('image')->nullable();
            $table->string('delivery_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
