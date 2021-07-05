<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembimbingIndustrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembimbing_industris', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->unsignedInteger('perusahaan_id')->constrained('perusahaans')->nullable();
            $table->unsignedInteger('jurusan_id')->constrained('jurusans')->nullable();
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
        Schema::dropIfExists('pembimbing_industris');
    }
}
