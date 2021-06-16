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
            $table->unsignedBigInteger('shop_id');
            $table->string('name, 100');
            $table->string('kana, 100');
            $table->string('sex, 50')->nullable();
            $table->date('birthday')->nullable();
            $table->string('job, 50')->nullable();
            $table->string('tel, 100')->nullable();
            $table->string('email')->nullable();
            $table->text('motive')->nullable();
            $table->text('where')->nullable();
            $table->text('memo')->nullable();
            $table->text('request')->nullable();

            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
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
