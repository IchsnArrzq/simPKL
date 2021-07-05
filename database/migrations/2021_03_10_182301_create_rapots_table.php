<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapots', function (Blueprint $table) {
            $table->id();
            $table->integer('kedisiplinan')->nullable();
            $table->integer('kompetensi')->nullable();
            $table->integer('sikap')->nullable();
            $table->foreignId('siswa_id')->constrained('siswas');
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
        Schema::dropIfExists('rapots');
    }
}
