<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name',30);
            $table->string('last_name',30);
            $table->string('email')->unique();
            $table->string('mobile',15);
            $table->string('profession',30);
            $table->string('education_type',30)->nullable();
            $table->string('education',30)->nullable();
            $table->string('institute_name',100);
            $table->tinyInteger('blood_donation_status')->default(0);
            $table->string('membership_status',10)->default('free');
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('street_address')->nullable();
            $table->string('upozila',25)->nullable();
            $table->string('blood_group',10)->nullable();
            $table->string('country',40)->nullable();
            $table->string('district',40)->nullable();
            $table->tinyInteger('created_by')->nullable();
            $table->tinyInteger('updated_by')->nullable();
            $table->tinyInteger('deleted_by')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
