<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id('id_estudiante');
            $table->string('nombre', 30)->nullable();
            $table->string('apellido', 30)->nullable();
            $table->string('codigo', 8)->nullable();
            $table->integer('id_tutor')->nullable();
            $table->integer('id_curso')->nullable();
            $table->timestamps();



            $table->foreign('id_tutor')->references('id')->on('tutor')->onDelete('cascade');
           $table->foreign('id_curso')->references('id')->on('cursos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
};
