<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('remarks')->nullable();
            $table->date('paid_upto');            
            $table->string('payment_method');
            $table->enum('status',['paid','unpaid']);  
            $table->Integer('monthly_salary');
            $table->Integer('remaining_amt')->nullable();           
            $table->foreignId('user_id')->constrained('all_users')->onDelete('cascade');
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
        Schema::dropIfExists('salaries');
    }
}
