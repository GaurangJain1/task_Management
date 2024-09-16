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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Assioner');
            $table->foreign('Assioner')->reference('id')->on('users');
            $table->unsignedBigInteger('Assignee');
            $table->foreign('Assignee')->reference('id')->on('users');
            $table->unsignedBigInteger('task_id');
            $table->foreign('task_id')->reference('task_id')->on('tasks');
            $table->timestamps();

            // ----------EASY APPROACH----------
            // $table->id();
            // $table->unsignedBigInteger('user');
            // $table->foreign('user')->reference('id')->on('users');
            // $table->unsignedBigInteger('role');
            // $table->foreign('role')->reference('Role')->on('roles');
            // $table->unsignedBigInteger('task_id');
            // $table->foreign('task_id')->reference('task_id')->on('tasks');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
