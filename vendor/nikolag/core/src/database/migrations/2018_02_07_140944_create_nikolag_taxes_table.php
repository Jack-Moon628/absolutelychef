<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNikolagTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nikolag_taxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->float('percentage');
            $table->string('reference_id', 25)->nullable();
            $table->string('reference_type')->nullable();
            $table->timestamps();
        });

        Schema::table('nikolag_taxes', function (Blueprint $table) {
            $table->index('name');
            $table->index('type');
            $table->unique(['name', 'type'], 'name_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nikolag_taxes');
    }
}
