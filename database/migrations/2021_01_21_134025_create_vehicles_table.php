<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->string('lice_plate');
            $table->string('brand');
            $table->string('type');
            $table->string('owner_id');
            $table->timestamps();
            $table->primary('lice_plate');
            $table->foreign('owner_id')->references('identity_card')->on('owners');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
