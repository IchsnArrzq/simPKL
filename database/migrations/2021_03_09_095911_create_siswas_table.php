<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->date('ttl')->nullable();
            $table->string('nis')->unique();
            $table->string('nisn')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('user_id')->constrained('users');
            // $table->foreignId('ketua_kompetensi_keahlian_id')->constrained('ketua_kompetensi_keahlians');
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
        Schema::dropIfExists('siswas');
    }
}
