<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laundries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            

            $table->string('deliveryCost');
            $table->string('image_header');
            $table->string('image_logo');
            $table->string('laundryName');
            $table->string('laundryPhoneNumber');
            $table->string('minimumCharge');
            $table->string('discount')->default(0.00);
            $table->string('price_list');
            $table->string('rating')->default(0.00);
            $table->string('separate_qleaning')->default("false");
            $table->string('times');

            

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laundry');
    }
};
