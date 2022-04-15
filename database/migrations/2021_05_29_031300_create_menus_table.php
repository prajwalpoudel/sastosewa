<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->string('title');
            $table->integer('order');
            $table->string('icon')->nullable();
            $table->string('class')->nullable();
            $table->boolean('status')->default(true);
            $table->string('route')->nullable();
            $table->text('related_routes')->nullable();
            $table->timestamps();

            $table->foreign('group_id')->references('id')->on('menu_groups');
            $table->foreign('parent_id')->references('id')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
