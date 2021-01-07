<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTwitterUserJobsTable extends Migration
{
    public function up()
    {
        Schema::table('twitter_user_jobs', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_2933067')->references('id')->on('twitter_users');
            $table->integer('job_id');
            $table->foreign('job_id', 'job_fk_2933071')->references('id')->on('jobs');
        });
    }
}
