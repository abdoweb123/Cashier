<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{

    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('category_id');
            $table->string('product_name');
            $table->string('file_name');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('sell_price');
            $table->integer('total');
            $table->integer('paid_money');
            $table->integer('remain_money');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('supplier_id')->references('id')
                ->on('suppliers')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
