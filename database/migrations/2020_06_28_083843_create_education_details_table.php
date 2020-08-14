<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_details', function (Blueprint $table) {
            $table->id();
            $table->string('inst_name');
            $table->string('inst_address');
            $table->string('degree');
            $table->string('faculty');
            $table->string('board');
            $table->date('passed_year');
            $table->string('division');
            $table->timestamps();
            $table->foreignId('user_id')->constrained('all_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_details');
    }
}
