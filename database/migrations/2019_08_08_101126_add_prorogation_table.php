<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProrogationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prorogation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('dateProrogation');
            $table->text('motifProrogation');
            $table->unsignedBigInteger('responsable_id');
            $table->unsignedBigInteger('demande_id');
            $table->foreign('responsable_id')->references('id')->on('responsables');
            $table->foreign('demande_id')->references('id')->on('demandes');
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
        Schema::dropIfExists('prorogation');
    }
}
