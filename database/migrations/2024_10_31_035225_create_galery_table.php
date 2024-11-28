<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleryTable extends Migration
{
    protected $fillable = ['post_id', 'position', 'status'];
    
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('galery', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('post')->onDelete('cascade');
            $table->integer('position');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galery');
    }
};
