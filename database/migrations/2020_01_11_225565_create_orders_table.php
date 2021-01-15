<?php

use App\Enums\OrderPaymentStatusEnum;
use App\Enums\OrderStatusEnum;
use App\Enums\PackageTypeEnums;
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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('transaction_id')->nullable();
            $table->float('amount');
            $table->integer('job_qty');
            $table->enum('package_type', PackageTypeEnums::getValues());
            $table->string('promotion_code')->unique()->nullable();
            $table->integer('job_posted')->nullable();
            $table->enum('status',OrderStatusEnum::getValues())->default(OrderStatusEnum::PENDING);
            $table->enum('payment_status',OrderPaymentStatusEnum::getValues());
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
