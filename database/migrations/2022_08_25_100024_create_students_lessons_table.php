<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_lessons', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 9);
            $table->foreign('nim')->references('nim')->on('students')->onDelete('restrict')->onUpdate('cascade');
            $table->string('kode_matkul', 10);
            $table->foreign('kode_matkul')->references('kode_matkul')->on('lessons')->onDelete('restrict')->onUpdate('cascade');
            $table->tinyInteger('semester');
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
        Schema::dropIfExists('students_lessons');
    }
}
