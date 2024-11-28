<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('fotos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('galery_id')->constrained('galery');
        $table->string('file');
        $table->string('judul');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('foto');
}


}
