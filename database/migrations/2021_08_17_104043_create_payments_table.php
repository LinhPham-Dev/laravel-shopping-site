<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transaction_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->float('money');
            $table->string('note');
            $table->string('vnp_response_code')->nullable()->comment('Mã phản hồi');
            $table->string('code_vnpay')->nullable()->comment(
                'Mã giao dịch'
            );
            $table->string('code_bank')->nullable()->comment('Mã ngan hàng');
            $table->dateTime('time')->default(date("YmdHis"))->comment('Mã ngan hàng');
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
        Schema::dropIfExists('payments');
    }
}
