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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamp('date')->nullable();
            $table->boolean('status')->default(false);
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->float('price')->nullable();
            $table->float('no_of_tickets')->nullable();
            $table->float('commission')->nullable();
            $table->timestamp('booked_at')->nullable();
            $table->time('departure_time')->nullable();
            $table->time('arrival_time')->nullable();

            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('ticket_categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('ticket_brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
