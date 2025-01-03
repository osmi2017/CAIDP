<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('decison');
            $table->string('propose_par_ri');
            $table->string('valide_par_rh');
            $table->date('dateValidation');
            $table->boolean('etat')->default(false)->comment('si 0 alors la décison n\'a pas encore été validé par le responsable hiérachique ');
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
        Schema::dropIfExists('decisons');
    }
}
