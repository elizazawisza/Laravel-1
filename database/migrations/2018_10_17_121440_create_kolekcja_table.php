<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKolekcjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kolekcja', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazwa');
            $table->string('rok');
            $table->decimal('cena',10,2);
            $table->integer('pamiec');
            $table->string('kolor');
            $table->double('przekatna');
            $table->string('zdjecie');
            $table->integer('kolejka')->nullable();
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
        Schema::dropIfExists('kolekcja');
    }
}

