<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJobTypeColumnToJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->integer('duration')->after('summary');
            $table->dateTime('start_date')->after('duration')->nullable();
            $table->dateTime('end_date')->after('start_date')->nullable();
            $table->unsignedInteger('job_type_id')->nullable()->after('duration');
            $table->foreign('job_type_id')->references('id')->on('job_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign(['job_type_id']);
        });
    }
}
