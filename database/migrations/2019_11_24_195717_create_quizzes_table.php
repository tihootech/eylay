<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid')->unique()->index();
            $table->string('title')->unique()->index();
            $table->string('type')->default('quiz');
            $table->text('info');
            $table->string('image')->nullable();
            $table->string('bg')->nullable();
            $table->string('button')->nullable();
            $table->unsignedInteger('max_time')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('public')->default(0);
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
        Schema::dropIfExists('quizzes');
    }
}
