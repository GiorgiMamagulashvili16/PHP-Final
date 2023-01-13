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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string("parentId");
            $table->string("authorId");
            $table->string("author");
            $table->string("position");
            $table->string("question");
            $table->string("answerOne");
            $table->string("answerTwo");
            $table->string("answerThree");
            $table->string("answerFour");
            $table->string("correctAnswer");
            $table->string("image")->nullable();
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
        Schema::dropIfExists('questions');
    }
};
