<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_title');
            $table->string('company');
            $table->string('location');
            $table->string('salary');
            $table->longText('summary');
            $table->string('post_date');
            $table->string('link')->unique();
            $table->longText('full_text');
            $table->integer('new')->nullable();
            $table->integer('twitter')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
