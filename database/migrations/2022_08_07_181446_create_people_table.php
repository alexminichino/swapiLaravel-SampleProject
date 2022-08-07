<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name",100);
            $table->bigInteger('height');
            $table->bigInteger('mass');
            $table->string("hair_color",100);
            $table->string("skin_color",100);
            $table->string("eye_color",100);
            $table->string("birth_year", 100);
            $table->string("gender", 100);
            $table->string("url",100);

            $table->unsignedBigInteger('homeworld_id')->nullable(); 
            
        });

        Schema::table('people', function($table) {
            $table->foreign('homeworld_id')->references('id')->on('planets')->bigInteger('homeworld_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
