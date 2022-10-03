<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsTable extends Migration
{

    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('product_id');
            $table->string('name',100);
            $table->string('photo')->nullable()->default('0');
            $table->string('buy_price',100);
            $table->string('sell_price',100);
            $table->string('quantity',100);
            $table->string('buy_totalPrice',100);
            $table->string('profit',100);
            $table->string('totalBefore',100);
            $table->string('discount',100)->nullable()->default('0');
            $table->string('totalAfter',100);
            $table->string('given',100)->nullable()->default('0');
            $table->string('remaining',100)->nullable()->default('0');
            $table->string('months',100)->nullable()->default('0');
            $table->string('ration',100)->nullable()->default('0');
            $table->string('surety',100)->nullable()->default('0');
            $table->string('surety_phone',100)->nullable()->default('0');
            $table->string('date',100)->nullable()->default('0');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_id')->references('id')
                ->on('clients')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('product_id')->references('id')
                ->on('big_stores')->onDelete('cascade')->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('sells');
    }
}
