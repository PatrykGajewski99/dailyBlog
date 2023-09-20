<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_name',64);
            $table->string('last_name',64);
            $table->string('phone_number',32)->unique();
            $table->string('email')->unique();
            $table->string('country',64)->index();
            $table->string('town',64)->nullable();
            $table->string('password', 128);
            $table->rememberToken();
            $table->timestampsTz();
        });
    }

    public function down()
    {
    Schema::dropIfExists('user');
    }
};
