<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarrantyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranty_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('warranty_id')->unsigned();
            $table->integer('loan_id')->unsigned();
            $table->string('name');
            $table->double('price', 11,2);
            $table->text('notes');
            $table->timestamps();
            
            $table->foreign('warranty_id')
                    ->references('id')
                    ->on('warranties');
            
            $table->foreign('loan_id')
                    ->references('id')
                    ->on('loans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('warranty_details');
    }
}
