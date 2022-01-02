<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade')->onUpdate('cascade');
=======
            $table->foreignId('course_id')->constrained('courses');
>>>>>>> 184f23f (Course & subject relationonal db create, edit, Update)
            $table->string('Subject1');
            $table->string('Subject2');
            $table->string('Subject3');
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
        Schema::dropIfExists('subjects');
    }
}
