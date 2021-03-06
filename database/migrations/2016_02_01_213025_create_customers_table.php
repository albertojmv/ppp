<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('phone');
            $table->string('cellphone');
            $table->string('cedula');
            $table->string('passport');
            $table->integer('country_id')->unsigned();
            $table->string('address');
            $table->integer('province_id')->unsigned();
            $table->string('email');
            $table->integer('civilstatu_id')->unsigned();
            $table->string('profession');
            $table->integer('gender_id')->unsigned();
            $table->text('notes');
            $table->date('birthdate');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('country_id')
                    ->references('id')
                    ->on('countries');
            $table->foreign('province_id')
                    ->references('id')
                    ->on('provinces');
            $table->foreign('civilstatu_id')
                    ->references('id')
                    ->on('civilstatus');
            $table->foreign('gender_id')
                    ->references('id')
                    ->on('genders');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('customers');
    }

}
