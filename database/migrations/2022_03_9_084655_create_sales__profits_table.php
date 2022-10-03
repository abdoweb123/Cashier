<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesProfitsTable extends Migration
{

    public function up()
    {
        Schema::create('sales_profits', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('product_id');
            $table->string('name');
            $table->string('profit');
            $table->string('buy_totalPrice');
            $table->string('totalAfter');
            $table->string('sales');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('big_stores')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('sales_profits');
    }
}
