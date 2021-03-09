<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_users', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            // $table->tinyInteger('role_id')->nullable();
            $table->boolean('status')->default(0);
            $table->string('image')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->integer('sub_department')->nullable();
            $table->string('position');
            $table->date('joined_date');
            $table->dateTime('email_verified_at')->nullable();
            $table->rememberToken();
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            // $table->foreign('department_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            // $table->foreignId('sub_department_id')->constrained('departments')->onDelete('cascade');
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
        Schema::dropIfExists('all_users');
    }
}
