<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('references_type_id')->unsigned();
            $table->string('name');
            $table->string('address');
            $table->integer('province_id')->unsigned();
            $table->string('phone');
            $table->string('work');
            $table->string('workphone');
            $table->integer('customer_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('customer_id')
                    ->references('id')
                    ->on('customers');
            $table->foreign('province_id')
                    ->references('id')
                    ->on('provinces');
            $table->foreign('references_type_id')
                    ->references('id')
                    ->on('references_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('references');
    }
}
