<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('nim', 9);
            $table->primary('nim');
            $table->string('nama', 50);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->enum('agama', ['Islam', 'Katolik', 'Protestan', 'Buddha', 'Hindu', 'Konghucu']);
            $table->string('email')->unique();
            $table->string('no_telp', 20);
            $table->string('alamat');
            $table->tinyInteger('semester');
            $table->string('kode_jurusan', 10);
            $table->foreign('kode_jurusan')->references('kode_jurusan')->on('majors')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('students');
    }
}
