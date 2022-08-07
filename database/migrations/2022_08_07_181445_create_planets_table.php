<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name", 100);
            $table->bigInteger('rotation_period');
            $table->bigInteger('orbital_period');
            $table->bigInteger('diameter');
            $table->string("climate", 100);
            $table->string("gravity", 100);
            $table->string("terrain", 100);
            $table->bigInteger('surface_water');
            $table->bigInteger('population');
            $table->string("url",100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planets');
    }
}
