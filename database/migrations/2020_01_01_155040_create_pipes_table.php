<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->bigInteger('price')->nullable();
            $table->char('unit',128)->nullable();
            $table->integer('parentPipe')->default('0')->nullable();
            $table->integer('mainPipe')->nullable();
            $table->integer('count')->nullable();
             $table->string('img');
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
        Schema::dropIfExists('pipes');
    }
}
