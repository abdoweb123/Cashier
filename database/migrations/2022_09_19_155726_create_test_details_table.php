<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('test_id');
            $table->string('product_name');
            $table->string('unit');
            $table->decimal('quantity',8,2)->default(0.00);
            $table->decimal('unit_price',8,2)->default(0.00);
            $table->decimal('row_sub_total',8,2)->default(0.00);
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('test_details');
    }
}
