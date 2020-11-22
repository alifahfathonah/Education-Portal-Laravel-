<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamPanelNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_panel_names', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
            $table->tinyInteger('status')->default(0)->comment('0=Inactive, 1=Active');
            $table->tinyInteger('created_by');
            $table->tinyInteger('updated_by')->nullable();
            $table->tinyInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_panel_names');
    }
}
