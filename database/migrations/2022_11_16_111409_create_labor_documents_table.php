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
        Schema::create('labor_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('labor_id');
            $table->string('title')->nullable();
            $table->string('content', 500)->nullable();
            $table->timestamps();

            $table->foreign('labor_id')->references('id')->on('labors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labor_documents');
    }
};
