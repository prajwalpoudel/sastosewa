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
        Schema::create('labor_document_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('labor_document_id');
            $table->string('title')->nullable();
            $table->string('media')->nullable();
            $table->timestamps();

            $table->foreign('labor_document_id')->references('id')->on('labor_documents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labor_document_media');
    }
};
