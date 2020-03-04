<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_name');
            $table->string('sex')->nullable();
            $table->date('dob')->nullable();
            $table->string('phone',12)->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password',200);
            $table->integer('code')->nullable();
            $table->boolean('is_active')->defafult(1);
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('commune')->nullable();
            $table->string('village')->nullable();
            $table->integer('lat')->nullable();
            $table->integer('lng')->nullable();
            $table->rememberToken();
            $table->string('api_token')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('customers');
    }
}
