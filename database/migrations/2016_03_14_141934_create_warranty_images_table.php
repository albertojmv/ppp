<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarrantyImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranty_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('warranty_detail_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
            
            $table->foreign('warranty_detail_id')
                    ->references('id')
                    ->on('warranty_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('warranty_images');
    }
}
