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
            $table->string('nis')->unique();
            $table->string('nisn')->nullable();
            $table->string('nama')->nullable();
            $table->date('ttl')->nullable();
            $table->unsignedInteger('jurusan_id')->nullable();
            $table->unsignedInteger('periode_id')->nullable();
            $table->unsignedInteger('pembimbing_id')->nullable();
            $table->unsignedInteger('kakomli_id')->nullable();
            $table->unsignedInteger('perusahaan_id')->nullable();
            $table->foreignId('user_id')->constrained('users');

            // $table->foreign('jurusan_id')->references('id')->on('jurusans');
            // $table->foreign('periode_id')->references('id')->on('periodes');
            // $table->foreign('pembimbing_id')->references('id')->on('pembimbing');
            // $table->foreign('kakomli_id')->references('id')->on('kakomlis');
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
