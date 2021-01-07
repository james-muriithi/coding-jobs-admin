<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostedJobsTable extends Migration
{
    public function up()
    {
        Schema::create('posted_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('platform');
            $table->string('link');
            $table->timestamps();
        });
    }
}
