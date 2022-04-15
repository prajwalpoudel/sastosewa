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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamp('date')->nullable();
            $table->boolean('status')->default(false);
            $table->float('price')->nullable();
            $table->float('commission')->nullable();
            $table->timestamp('booked_at')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('tour_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
};
