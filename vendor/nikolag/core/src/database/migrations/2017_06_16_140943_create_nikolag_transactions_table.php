<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNikolagTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nikolag_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status', 50);
            $table->string('amount');
            $table->string('currency');
            $table->unsignedInteger('customer_id')->nullable()->default(null);
            $table->string('payment_service_id')->nullable();
            $table->string('payment_service_type', 25);
            $table->string('merchant_id')->nullable()->default(null);
            $table->string('order_id')->nullable()->default(null);
            $table->timestamps();
        });

        Schema::table('nikolag_transactions', function (Blueprint $table) {
            $table->index('status');
            $table->index('payment_service_type');
            $table->foreign('customer_id', 'cus_id')->references('id')->on('nikolag_customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nikolag_transactions');
    }
}
