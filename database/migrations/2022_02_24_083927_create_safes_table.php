<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSafesTable extends Migration
{

    public function up()
    {
        Schema::create('safes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('added');
            $table->string('notes');
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('safes');
    }
}
