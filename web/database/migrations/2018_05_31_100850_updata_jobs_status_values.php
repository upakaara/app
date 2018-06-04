<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdataJobsStatusValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('jobs', function (Blueprint $table) {
            $table->enum('status', ['approval','pending', 'started', 'ended'])->default('approval');            
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
            $table->dropColumn('status');
        });

        Schema::table('jobs', function (Blueprint $table) {
            $table->enum('status', ['approval','pending', 'open', 'closed'])->default('approval');        
        });
    }
}
