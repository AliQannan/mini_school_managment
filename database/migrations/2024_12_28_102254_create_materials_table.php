<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();  // Primary Key
            $table->string('title');  // Material Title
            $table->text('description')->nullable();  // Material Description
            $table->string('file_path')->nullable();  // Material File Path (optional)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Foreign Key linking to users table
            $table->foreignId('quiz_id')->nullable()->constrained()->onDelete('cascade');  // Foreign Key linking to quizzes table
            $table->timestamps();  // Created at & Updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
