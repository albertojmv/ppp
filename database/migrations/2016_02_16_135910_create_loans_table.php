<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            
            $table->timestamps();

            $table->foreign('customer_id')
                    ->references('id')
                    ->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('loans');
    }

}
