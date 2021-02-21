<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateARelBetweenPipeAndFactoryPipe extends Migration
{
    /**
     * Run the migrations.
     * pipe 1
     * factorypipe x,y,z
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factorypip_pipe', function (Blueprint $table) {
            $table->unsignedBigInteger('factorypip_id');
            $table->foreign('factorypip_id')->references('id')->on('factory_pipes')->onDelete('cascade');

            $table->unsignedBigInteger('pipe_id');
            $table->foreign('pipe_id')->references('id')->on('pipes')->onDelete('cascade');

            $table->unique(['factorypip_id','pipe_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factorypip_pipe');
    }
}
