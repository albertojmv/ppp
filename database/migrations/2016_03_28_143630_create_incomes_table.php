<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('position');
            $table->double('amount', 11,2);
            $table->integer('customer_id')->unsigned();
            $table->integer('typeofcompany_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('customer_id')
                    ->references('id')
                    ->on('customers');
            $table->foreign('typeofcompany_id')
                    ->references('id')
                    ->on('typeofcompanies');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('incomes');
    }
}
