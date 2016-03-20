<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanapplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loanapplications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('cedula');
            $table->string('email');
            $table->string('phone');
            $table->string('cellphone');
            $table->double('amount', 11,2);
            $table->string('cuotas');
            $table->string('workplace');
            $table->string('timeworked');
            $table->double('salary', 11,2);
            $table->double('additional_income', 11,2);
            $table->string('concept_income');
            $table->boolean('vehicle');
            $table->string('brand');
            $table->string('model');
            $table->string('year');
            $table->boolean('home');
            $table->string('time_living');
            $table->integer('civilstatu_id')->unsigned();
            $table->timestamps();
            
            
            $table->foreign('civilstatu_id')
                    ->references('id')
                    ->on('civilstatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('loanapplications');
    }
}
