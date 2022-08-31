<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->string('kode_matkul', 10);
            $table->primary('kode_matkul');
            $table->string('nama_matkul', 100);
            $table->tinyInteger('sks');
            $table->string('kode_jurusan', 10);
            $table->foreign('kode_jurusan')->references('kode_jurusan')->on('majors')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('lessons');
    }
}
