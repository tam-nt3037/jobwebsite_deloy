<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_news', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('id_account_recruiter');
            $table->text('office');
            $table->integer('number_recruits');
            $table->text('level');
            $table->integer('id_type_work');
            $table->integer('level_salary');
            $table->text('location_work');
            $table->text('description_work');
            $table->text('benefit');
            $table->integer('id_year_experience');
            $table->text('gender');
            $table->date('time_for_submission');
            $table->integer('id_languages_profile');
            $table->text('require_work');
            $table->text('require_profile');
            $table->dateTime('date_posted');
            $table->text('email_received_recruit');
            $table->text('state_show');

            
//            $table->string('email')->unique();
//            $table->string('password');
//            $table->rememberToken();
//            $table->timestamps();
//            $table->string('email')->index();
//            $table->string('token');
//            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_news');
    }
}
