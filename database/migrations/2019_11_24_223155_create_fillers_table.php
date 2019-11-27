<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFillersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fillers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('quiz_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('uid');
            $table->unsignedInteger('corrects')->nullable();
            $table->unsignedInteger('wrongs')->nullable();
            $table->unsignedInteger('time')->nullable();
            $table->unsignedSmallInteger('percentage')->nullable();
            $table->dateTime('finished_at')->nullable();
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
        Schema::dropIfExists('fillers');
    }
}
