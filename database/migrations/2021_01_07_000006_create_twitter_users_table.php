<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTwitterUsersTable extends Migration
{
    public function up()
    {
        Schema::create('twitter_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('screen_name');
            $table->string('user_id_str');
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->integer('subscribed')->nullable();
            $table->string('preference')->nullable();
            $table->string('profile_image_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
