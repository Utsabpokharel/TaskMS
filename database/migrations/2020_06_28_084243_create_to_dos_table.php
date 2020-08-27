<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToDosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_dos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->date('assignedDate');
            $table->date('completedDate')->nullable();
            $table->string('assignedTo');
            $table->date('deadline');
            $table->string('task_priority');
            $table->string('fileUpload')->nullable();
            $table->string('assignedBy');
            $table->string('ReAssignedBy')->nullable();            
            $table->string('reAssignedTo')->nullable();
            $table->date('reAssignedDate')->nullable();
            $table->date('reDeadline')->nullable();           
            $table->boolean('status')->default(0);
            $table->longText('remarks')->nullable();
            $table->foreignId('user_id')->constrained('all_users')->onDelete('cascade');
            $table->foreignId('ReUser_id')->nullable();
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
        Schema::dropIfExists('to_dos');
    }
}
