<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxi_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('taxi_id');
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('price')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('taxi_id')->references('id')->on('taxis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxi_details');
    }
};
