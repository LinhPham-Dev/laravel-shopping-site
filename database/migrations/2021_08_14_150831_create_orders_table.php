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
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('phone', 20);
            $table->string('address');
            $table->string('payment_methods');
            $table->string('shipping_unit');
            $table->timestamp('confirm')->nullable();
            $table->string('token', 20);
            $table->text('note')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 unconfirmed, 1 in process, 2 in delivery, 3 delivered successfully');
            $table->float('total_amount');
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
