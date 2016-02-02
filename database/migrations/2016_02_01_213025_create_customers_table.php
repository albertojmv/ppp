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
            $table->string('address');
            $table->integer('province_id')->unsigned();
            $table->string('email');
            $table->timestamps();

            $table->foreign('province_id')
                    ->references('id')
                    ->on('provinces');
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
