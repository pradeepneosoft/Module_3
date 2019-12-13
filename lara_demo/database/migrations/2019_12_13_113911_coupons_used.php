<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CouponsUsed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons_used', function (Blueprint $table) {
            $table->increments('id');
            
            
            $table->integer('user_id')->nullable();
            $table->integer('order_id')->nullable();
            $table->integer('coupon_id')->nullable();
            $table->timestamps();



            
            });        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coupons_used');
    }
}
