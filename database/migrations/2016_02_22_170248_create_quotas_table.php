<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->date('datepayment');
            $table->date('dateexpiration');
            $table->double('amount', 9,2);
            $table->double('surcharge', 9,2);
            $table->double('interest', 9,2);
            $table->double('capital', 9,2);
            $table->integer('loan_id')->unsigned();
            $table->integer('quotastatu_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('loan_id')
                    ->references('id')
                    ->on('loans');
            
            $table->foreign('quotastatu_id')
                    ->references('id')
                    ->on('quotastatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quotas');
    }
}
