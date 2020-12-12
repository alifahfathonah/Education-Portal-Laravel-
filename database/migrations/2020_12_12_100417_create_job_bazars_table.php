<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobBazarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_bazars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('jobId');
            $table->string('title');
            $table->string('logo');
            $table->string('company_name');
            $table->string('location');
            $table->longText('description');
            $table->tinyInteger('status')->default(0)->comment('0=Inactive,1=Active');
            $table->tinyInteger('created_by');
            $table->tinyInteger('updated_by')->nullable();
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
        Schema::dropIfExists('job_bazars');
    }
}
