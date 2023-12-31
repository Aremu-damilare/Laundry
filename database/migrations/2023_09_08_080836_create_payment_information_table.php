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
        Schema::create('payment_information', function (Blueprint $table) {
            
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            
            
            $table->string('crno');
            $table->string('accountName');
            $table->string('accountNumber');
            $table->string('bankName');
            $table->string('iban');
            $table->date('payableDate')->nullable();
            $table->string('payment_method');
            


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
        Schema::dropIfExists('payment_information');
    }
};
