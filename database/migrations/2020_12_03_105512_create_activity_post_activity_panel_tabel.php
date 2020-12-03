<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityPostActivityPanelTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_post_activity_panel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('activity_post_id');
            $table->unsignedBigInteger('activity_panel_id');
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
        Schema::dropIfExists('activity_post_activity_panel');
    }
}
