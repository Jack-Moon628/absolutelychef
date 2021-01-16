<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNikolagCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nikolag_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_service_id')->nullable();
            $table->string('payment_service_type', 25);
            $table->string('first_name')->nullable()->default(null);
            $table->string('last_name')->nullable()->default(null);
            $table->string('company_name')->nullable()->default(null);
            $table->string('nickname')->nullable()->default(null);
            $table->string('email')->unique();
            $table->string('phone')->nullable()->default(null);
            $table->longText('note')->nullable()->default(null);
            $table->timestamps();
        });

        Schema::table('nikolag_customers', function (Blueprint $table) {
            $table->unique(['payment_service_type', 'payment_service_id'], 'pstype_psid');
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nikolag_customers');
    }
}
