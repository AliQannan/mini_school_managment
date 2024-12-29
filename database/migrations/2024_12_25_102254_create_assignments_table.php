<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();  // Primary Key
            $table->string('title');  // Assignment Title
            $table->text('description')->nullable();  // Assignment Description
            $table->date('due_date');  // Due Date
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Foreign Key linking to users table
            $table->timestamps();  // Created at & Updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}
