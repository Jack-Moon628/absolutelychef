<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNikolagCustomerUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nikolag_customer_user', function (Blueprint $table) {
            $table->string('owner_id');
            $table->unsignedInteger('customer_id');
        });

        Schema::table('nikolag_customer_user', function (Blueprint $table) {
            $table->unique(['owner_id', 'customer_id'], 'oid_cid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nikolag_customer_user');
    }
}
