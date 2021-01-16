<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNikolagProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nikolag_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('variation_name', 100)->nullable();
            $table->string('note', 50)->nullable();
            $table->float('price');
            $table->string('reference_type')->nullable();
            $table->string('reference_id', 25)->nullable();
            $table->timestamps();
        });

        Schema::table('nikolag_products', function (Blueprint $table) {
            $table->index('name');
            $table->index('reference_id');
            $table->unique(['name', 'variation_name'], 'vname_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nikolag_products');
    }
}
