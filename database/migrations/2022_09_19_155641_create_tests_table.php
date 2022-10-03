<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('company_name');
            $table->string('invoice_number');
            $table->string('invoice_date');
            $table->decimal('sub_total',8,2)->default(0.00);
            $table->string('discount_type')->nullable();
            $table->decimal('discount_value',8,2)->default(0.00);
            $table->decimal('vat_value',8,2)->default(0.00);
            $table->decimal('shipping',8,2)->default(0.00);
            $table->decimal('total_due',8,2)->default(0.00);
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
        Schema::dropIfExists('tests');
    }
}
