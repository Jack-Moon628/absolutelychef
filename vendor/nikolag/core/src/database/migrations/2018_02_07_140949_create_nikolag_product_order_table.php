<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNikolagProductOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nikolag_product_order', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->string('order_id', 25);
            $table->unsignedInteger('quantity')->default(1);
        });

        Schema::table('nikolag_product_order', function (Blueprint $table) {
            $table->foreign('product_id', 'prod_id')->references('id')->on('nikolag_products');
            $table->unique(['product_id', 'order_id'], 'prodid_ordid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nikolag_product_order');
    }
}
