<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnals', function (Blueprint $table) {
            $table->id();
            $table->string('divisi');
            $table->date('tanggal');
            $table->timestamp('mulai');
            $table->timestamp('selesai');
            $table->text('kegiatan');
            $table->text('hasil');
            $table->text('keterangan');
            $table->foreignId('jurusan_id')->constrained('jurusans');

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
        Schema::dropIfExists('jurnals');
    }
}
