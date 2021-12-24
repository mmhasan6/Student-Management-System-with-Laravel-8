<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseScheduledTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_scheduled', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_offer_id')->constrained('course_offered')->onDelete('cascade')->onUpdate('cascade');
            // ->references('id')->on('course_offered');
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
        Schema::dropIfExists('course_scheduled');
    }
}
