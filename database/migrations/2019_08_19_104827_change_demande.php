<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDemande extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demandes', function (Blueprint $table) {
            $table->boolean('etat')->comment("Si 0 alors pas encors traié, si 1 alors traité ou traiement en cours")->change();
            $table->integer('favorable')->comment("Si 1 alors non satisfait, si 2 alors partiellement satisfait, si 3 totalement satisfait")->change();
            $table->boolean("liquide")->comment("0=non liquide, 1=liquide")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('demandes', function (Blueprint $table) {
            //
        });
    }
}
