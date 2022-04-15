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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->nullable();
            $table->longText('m_description')->nullable();
            $table->longText('m_keyword')->nullable();
            $table->string('address', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('mobile', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('notification_email', 50)->nullable();
            $table->string('fax', 50)->nullable();
            $table->string('working_time', 50)->nullable();
            $table->string('fb_link', 100)->nullable();
            $table->string('twitter_link', 100)->nullable();
            $table->string('youtube_link', 100)->nullable();
            $table->string('insta_link', 100)->nullable();
            $table->string('whatsapp', 50)->nullable();
            $table->string('viber', 50)->nullable();
            $table->string('logo', 100)->nullable();
            $table->string('favicon', 100)->nullable();
            $table->string('footer_bg', 100)->nullable();

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
        Schema::dropIfExists('settings');
    }
};
