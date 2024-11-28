<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {  // Nama tabel 'profile'
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->timestamps();
        });
    }

    /**
     * Balikkan migrasi untuk menghapus tabel.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile');  // Nama tabel 'profile'
    }
}
