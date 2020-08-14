<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlueprintPart1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('jawaban_id')->nullable();
            $table->string('judul');
            $table->text('isi');
            $table->timestamps();
        });

        Schema::create('jawaban', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pertanyaan_id');
            $table->text('isi');
            $table->timestamps();
        });

        Schema::table('pertanyaan', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('jawaban_id')->references('id')->on('jawaban');
        });

        Schema::table('jawaban', function (Blueprint $table) {
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaan');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertanyaan');
        Schema::dropIfExists('jawaban');
    }
}
