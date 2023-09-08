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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();;
        
            
            $table->string('assignedLocation')->nullable();;
            $table->boolean('availability')->default(true);
            
            $table->integer('capacity_per_hour')->nullable();;
            $table->decimal('commission', 8, 2)->nullable();;
            $table->string('coordinates')->nullable();;
            
            
            
            
            
            $table->string('imageHeader')->nullable();;
            $table->string('imageLogo')->nullable();;
            
            
            
            $table->string('notification_devices')->nullable();;
            
            
            $table->string('phoneNumber')->nullable();;
            
            $table->string('pushToken')->nullable();;
            
            
            $table->json('services')->nullable();;
            

            $table->decimal('totalEarnings', 10, 2)->default(0.00);
            $table->integer('totalOrders')->default(0);
            $table->string('verification')->nullable();
            $table->boolean('verified')->default(false);

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
