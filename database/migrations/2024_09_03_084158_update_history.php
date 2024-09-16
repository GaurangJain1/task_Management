<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('histories', function (Blueprint $table) {
             
             $table->unsignedBigInteger('emp_id');
             $table->foreign('emp_id')->references('id')->on('users');
            

        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
// Schema::create('histories', function (Blueprint $table) {
//     $table->id();
//     $table->integer('task_id')->unsigned();
//     $table->foreign('task_id')->reference('task_id')->on('tasks');
//     $table->text('comments');
//     $table->integer('emp_id');
//     //$table->foreign('emp_id')->refererce('emp_id')->on('Role');
//     $table->timestamps();
// });
// Schema::table('histories', function($table) {
//     $table->foreign('task_id')->references('task_id')->on('tasks');
//     $table->foreign('emp_id')->references('emp_id')->on('Role');
// });