<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle');
            $table->string('description');
            $table->dateTime('dateDemande');
            $table->date('dateProrogation')->nullable();    
            $table->boolean('favorable')->comment('0 si non favorable et 1 si favorable')->nullable();
            $table->boolean('etat')->default(false);
            $table->boolean('brouillon')->default(true)->comment('si 0 alors la demande n\'est pas encore envoyé à l\'organisme. ');
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
        Schema::dropIfExists('demandes');
    }
}
