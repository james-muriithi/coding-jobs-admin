<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPostedJobsTable extends Migration
{
    public function up()
    {
        Schema::table('posted', function (Blueprint $table) {
//            $table->unsignedInteger('job_id');
            $table->foreign('job_id', 'job_fk_2933025')->references('id')->on('jobs');
        });
    }
}
