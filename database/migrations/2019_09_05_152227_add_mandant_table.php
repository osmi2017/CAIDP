<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMandantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('mandants')) {
        Schema::create('mandants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('profession');
            $table->string('domicile');
            $table->unsignedBigInteger('requerant_id');
            $table->foreign('requerant_id')->references('id')->on('requerants'); // Corrected foreign key definition
            $table->timestamps();
        });
    }
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mandants');
    }
}
