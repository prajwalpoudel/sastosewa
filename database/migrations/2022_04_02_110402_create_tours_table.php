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
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->string('code')->nullable();
            $table->string('grade')->nullable();
            $table->string('seasons')->nullable();
            $table->string('route')->nullable();
            $table->longText('description')->nullable();
            $table->longText('equipment')->nullable();
            $table->longText('itenary')->nullable();
            $table->longText('price_inclusive')->nullable();
            $table->longText('price_exclusive')->nullable();
            $table->timestamp('date')->nullable();
            $table->boolean('status')->default(false);
            $table->float('price')->nullable();
            $table->float('offer_price')->nullable();
            $table->float('discount')->nullable();
            $table->boolean('is_percent')->default(true);
            $table->float('commission')->nullable();
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
