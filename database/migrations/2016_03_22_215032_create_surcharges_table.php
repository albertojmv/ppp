<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurchargesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('surcharges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quota_id')->unsigned();
            $table->double('amount', 11,2);
            $table->timestamps();

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
    public function down() {
        Schema::drop('surcharges');
    }

}
