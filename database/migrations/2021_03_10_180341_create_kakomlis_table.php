<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKakomlisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kakomlis', function (Blueprint $table) {
            $table->id();
            $table->string('no_kakomli');
            $table->string('nama')->nullable();
            $table->unsignedInteger('jurusan_id')->nullable();
            $table->foreignId('user_id')->constrained('users');
            // $table->foreign('jurusan_id')->references('id')->on('jurusans');
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
        Schema::dropIfExists('kakomlis');
    }
}
