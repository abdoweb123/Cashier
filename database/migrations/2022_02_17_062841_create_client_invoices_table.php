<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('client_id')->unsigned();
            $table->integer('paid_all');
            $table->string('paid_date');
            $table->string('paid_notes');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('client_id')->references('id')
                ->on('clients')->onDelete('cascade')->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('client_invoices');
    }
}
