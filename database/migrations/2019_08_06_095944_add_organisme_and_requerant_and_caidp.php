<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrganismeAndRequerantAndCaidp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('requerant_id')->nullable();
            $table->unsignedBigInteger('responsable_id')->nullable();
            $table->foreign('requerant_id')->references('id')->on('requerants');
            $table->foreign('responsable_id')->references('id')->on('responsables');
            $table->boolean('caidp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
