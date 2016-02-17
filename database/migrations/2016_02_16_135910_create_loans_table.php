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
            $table->integer('warranty_id')->unsigned();
            $table->integer('paymentmethod_id')->unsigned();
            $table->integer('payday');
            $table->double('interest', 9,2);
            $table->double('surcharge', 9,2);
            $table->double('amount', 9,2);
            $table->integer('quotas');
            $table->integer('calculationtype_id')->unsigned();
            $table->integer('loanstatu_id')->unsigned();
            $table->date('delivery');
            $table->text('notes');
            $table->timestamps();

            $table->foreign('customer_id')
                    ->references('id')
                    ->on('customers');
            $table->foreign('warranty_id')
                    ->references('id')
                    ->on('warranties');
            $table->foreign('paymentmethod_id')
                    ->references('id')
                    ->on('paymentmethods');
            $table->foreign('calculationtype_id')
                    ->references('id')
                    ->on('calculationtypes');
            $table->foreign('loanstatu_id')
                    ->references('id')
                    ->on('loanstatus');
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
