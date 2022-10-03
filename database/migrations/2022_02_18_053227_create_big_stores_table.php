<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBigStoresTable extends Migration
{

    public function up()
    {
        Schema::create('big_stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('category_id');
            $table->string('product_name');
            $table->string('file_name');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('sell_price');
            $table->integer('total');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('supplier_id')->references('id')
                ->on('suppliers')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('big_stores');
    }
}
