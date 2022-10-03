<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{

    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->string('address')->nullable()->default('لا يوجد');
            $table->string('phone',100)->nullable()->default('لا يوجد');
            $table->string('notes')->nullable()->default('لا يوجد');
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
