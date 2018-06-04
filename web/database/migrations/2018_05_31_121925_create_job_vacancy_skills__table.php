<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobVacancySkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_vacancy_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_vacancy_id');
            $table->foreign('job_vacancy_id')->references('id')->on('job_vacancies')->onDelete('cascade');            
            $table->integer('skill_id');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');                        
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
        Schema::dropIfExists('job_vacancy_skills');
    }
}
