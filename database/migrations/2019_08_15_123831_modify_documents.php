<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            // Check if the column exists before adding it
            if (!Schema::hasColumn('documents', 'information_id')) {
                $table->unsignedBigInteger('information_id');
                $table->foreign('information_id')->references('id')->on('informations');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            // Drop the foreign key and the added column
            $table->dropForeign(['information_id']);
            $table->dropColumn('information_id');
        });
    }
}



