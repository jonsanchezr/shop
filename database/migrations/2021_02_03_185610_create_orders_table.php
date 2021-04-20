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
            $table->foreignId('address_id');
            $table->foreignId('payment_method_id');
            $table->foreignId('statu_id');
            $table->foreignId('shipping_company_id');
            $table->float('total', 15, 2);
            $table->float('subtotal', 15, 2);
            $table->float('tax', 15, 2);
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
