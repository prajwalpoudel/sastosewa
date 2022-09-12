<?php

use App\Constants\StatusConstant;
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
        Schema::create('taxi_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('taxi_detail_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->enum('status', [StatusConstant::PENDING, StatusConstant::ACCEPTED, StatusConstant::REJECTED])->default(StatusConstant::PENDING);
            $table->timestamps();

            $table->foreign('taxi_detail_id')->references('id')->on('taxi_details')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxi_bookings');
    }
};
