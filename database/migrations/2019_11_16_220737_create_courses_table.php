<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique()->index();
            $table->string('supertitle');
            $table->string('subtitle');
            $table->string('image');
            $table->string('bg')->nullable();
            $table->text('info');
            $table->string('status')->default('registering'); // registering, performing, closed
            $table->integer('step')->default(1); // step for reopening a course
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
        Schema::dropIfExists('courses');
    }
}
