<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrganismeToResponsable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('responsables', 'organisme_id')) {
            Schema::table('responsables', function (Blueprint $table) {
                $table->unsignedBigInteger('organisme_id');
                $table->foreign('organisme_id')->references('id')->on('organismes');
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
        Schema::table('responsables', function (Blueprint $table) {
            // Drop the column if needed in the down method
            $table->dropForeign(['organisme_id']);
            $table->dropColumn('organisme_id');
        });
    }
}
