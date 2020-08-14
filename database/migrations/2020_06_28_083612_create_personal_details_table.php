<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_details', function (Blueprint $table) {
            $table->id();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->date('dob');
            $table->longText('about');
            $table->string('ctzn_f');
            $table->string('ctzn_b');
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
        Schema::dropIfExists('personal_details');
    }
}
