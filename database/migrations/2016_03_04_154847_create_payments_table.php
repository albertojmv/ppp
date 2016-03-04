<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
        $table->increments('id');
        $table->double('amount', 9,2);
        $table->text('notes');
        $table->integer('formofpayment_id')->unsigned();
        $table->integer('quota_id')->unsigned();
        $table->timestamps();
            
        $table->foreign('formofpayment_id')
                    ->references('id')
                    ->on('formofpayments'); 
        $table->foreign('quota_id')
                    ->references('id')
                    ->on('quotas'); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('payments');
    }
}
