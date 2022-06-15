<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('nama_pelapor');
            $table->string('no_hp');
            $table->string('nama');
            $table->string('umur');
            $table->string('alamat');
            $table->string('nama_ortu');
            $table->text('kronologis');
            $table->enum('jenis_laporan', ['anak', 'perempuan']);
            $table->enum('status', ['butuh konfirmasi', 'sedang diproses', 'selesai', 'spam'])->default('butuh konfirmasi');
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
        Schema::dropIfExists('reports');
    }
};
