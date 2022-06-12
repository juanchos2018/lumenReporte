<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_numbers', function (Blueprint $table) {
            $table->increments('id');   
            $table->string('grupo', 100)->nullable();  
            $table->string('unid', 100)->nullable();  
            $table->string('phone', 100)->nullable();  
            $table->string('photo', 100)->nullable();  
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
        Schema::dropIfExists('help_numbers');
    }
}
