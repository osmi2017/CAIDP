<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQualiterespoIdOnresponsable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('responsables', 'qualiteresponsable_id')) {
            Schema::table('responsables', function (Blueprint $table) {
                $table->bigInteger('qualiteresponsable_id')->unsigned()->nullable();
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
        Schema::table('responsable', function (Blueprint $table) {
            //
        });
    }
}
