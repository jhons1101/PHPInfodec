<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->bigIncrements('cod_nota');
            $table->string('nom_estudiante', 100);
            $table->decimal('parcial1', $precision = 2, $scale = 1);
            $table->decimal('parcial2', $precision = 2, $scale = 1);
            $table->decimal('parcial3', $precision = 2, $scale = 1);
            $table->decimal('final', $precision = 2, $scale = 1);
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
        Schema::dropIfExists('notas');
    }
}
