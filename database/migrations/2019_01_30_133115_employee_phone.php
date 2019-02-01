<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeePhone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kolekcja_pracownik', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kolekcja_id')->unsigned()->index();
            $table->foreign('kolekcja_id')->references('id')->on('kolekcja')->onDelete('cascade');
            $table->integer('pracownik_id')->unsigned()->index();
            $table->foreign('pracownik_id')->references('id')->on('pracownicy')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_phone');
    }
}
