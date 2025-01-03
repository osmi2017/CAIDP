<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QualiteResposableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualiteresponsable', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('qualite');
            $table->boolean('default')->nullable()->default(1)->comment("si default != 0 alors ajouté par les organismes");
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
        Schema::dropIfExists('qualiteresposable');
    }
}
