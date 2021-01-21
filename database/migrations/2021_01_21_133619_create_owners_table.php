<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->string('identity_card');
            $table->string('name');
            $table->primary('identity_card');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('owners');
    }
}
