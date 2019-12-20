<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductAttrValsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attr_vals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('value')->nullable();
            $table->integer('product_attributes_id');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_attr_vals');
    }
}
