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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bookable_id');
            $table->string('bookable_type');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', [StatusConstant::PENDING, StatusConstant::ACCEPTED, StatusConstant::REJECTED])->default(StatusConstant::PENDING);
            $table->boolean('payment_status')->default(false);
            $table->float('booking_price')->nullable();
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
        Schema::dropIfExists('bookings');
    }
};
