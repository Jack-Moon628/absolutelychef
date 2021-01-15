<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCulomnsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('users',function(Blueprint $table){
            $table->string('title')->nullable();
            $table->string('surename')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('cv')->nullable();
            $table->boolean('visiable_cv')->nullable();
            $table->boolean('on_click_apply')->nullable();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumn('title');
        Schema::dropColumn('surename');
        Schema::dropColumn('postal_code');
        Schema::dropColumn('cv');
        Schema::dropColumn('visiable_cv');
        Schema::dropColumn('on_click_apply');
    }
}
