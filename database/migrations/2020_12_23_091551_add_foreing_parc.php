<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeingParc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parcs', function (Blueprint $table) {
            $table->unsignedBigInteger('idEtat');
            $table->foreign('idEtat')->references('id')->on('etats');
            $table->unsignedBigInteger('idSite');
            $table->foreign('idSite')->references('id')->on('sites');
            $table->unsignedBigInteger('idModele');
            $table->foreign('idModele')->references('id')->on('modeles');
            $table->unsignedBigInteger('idUtilisateur');
            $table->foreign('idUtilisateur')->references('id')->on('utilisateurs');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
