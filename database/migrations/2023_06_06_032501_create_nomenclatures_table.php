<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomenclaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomenclatures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('quantity');
            $table->double('price');
            $table->double('total')->nullable();
            $table->unsignedBigInteger('nomenclature_volume')->nullable();
            $table->string('currency'); //валюта
            $table->double('present_price');
            $table->double('present_total');
            $table->string('description');
            $table->string('comment');
            $table->timestamps();

            $table->index('id');
            $table->index('order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nomenclatures');
    }
}
