<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('info_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('home_phone')->nullable();
            $table->boolean('allow_contact')->nullable();
            $table->string('website_link1')->default('(JSON_ARRAY())');
            $table->string('website_link2')->default('(JSON_ARRAY())');
            $table->string('employer_type')->default('(JSON_ARRAY())');
            $table->tinyInteger('experience_year')->nullable();
            $table->string('current_job')->nullable();
            $table->string('current_salary')->default('(JSON_ARRAY())');
            $table->string('languages')->default('(JSON_ARRAY())');
            $table->text('summary')->nullable();
            $table->string('desired_job')->nullable();
            $table->string('desired_location')->nullable();
            $table->string('deisred_salary')->default('(JSON_ARRAY())');
            $table->string('job_type')->default('(JSON_ARRAY())');
            $table->boolean('eligibility_uk')->nullable();
            $table->boolean('eligibility_eu')->nullable();
            $table->boolean('visiable_cv')->nullable();
            $table->string('cover_letter')->nullable();
            $table->boolean('onCLick_apply')->nullable();
            $table->timestamps();

            
            // $table->foreign('user_id')
            // ->references('id')
            // ->on('users')
            // ->onDelete('CASCADE');
        });
        Schema::enableForeignKeyConstraints();
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('info_users');
        Schema::enableForeignKeyConstraints();
    }
}
