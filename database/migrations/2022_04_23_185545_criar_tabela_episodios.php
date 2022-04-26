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
        Schema::create('episodios', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->integer('temporada');
            $table->integer('numero');
            $table->boolean('assistido')->default(false);
            $table->tinyInteger('serie_id')->unsigned();

            $table->foreign('serie_id')
            ->references('id')
            ->on('series')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodios');
    }
};
