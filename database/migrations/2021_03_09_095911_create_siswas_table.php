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
            $table->string('nis')->nullable()->unique();
            $table->string('nama')->nullable();
            $table->string('tingkat')->nullable();
            $table->unsignedInteger('jurusan_id')->constrained('jurusans')->nullable();
            $table->unsignedInteger('pembimbing_industri_id')->constrained('pembimbing_industris')->nullable();
            $table->unsignedInteger('pembimbing_sekolah_id')->constrained('pembimbing_sekolahs')->nullable();
            $table->foreignId('user_id')->constrained('users');
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
