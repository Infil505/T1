<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('libros', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('edition');
        $table->integer('copyright');
        $table->string('language');
        $table->integer('pages');

        $table->unsignedBigInteger('author_id');
        $table->foreign('author_id')->references('id')->on('autors')->onDelete('cascade');

        $table->unsignedBigInteger('publisher_id');
        $table->foreign('publisher_id')->references('id')->on('editorials')->onDelete('cascade');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
