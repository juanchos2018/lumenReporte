<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidencesTable extends Migration
{
    
    public function up()
    {
        Schema::create('incidences', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');   
            $table->string('title', 100)->nullable();  
            $table->string('description', 100)->nullable();  
            $table->string('location', 100)->nullable();
            $table->string('lat', 100)->nullable();
            $table->string('lon', 100)->nullable();
            $table->string('photo', 300)->nullable();
            $table->date('date');
            $table->string('hour', 100)->nullable();
            $table->integer('state');

            $table->integer('type_incidence_id')->unsigned();
            $table->integer('organization_id')->unsigned();
            $table->integer('user_id')->unsigned();  
            $table->timestamps();

            $table->foreign('type_incidence_id')->references('id')->on('type_incidences');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('organization_id')->references('id')->on('organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidences');
    }
}
