<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
   
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->increments('id');   
            $table->string('title', 100)->nullable();  
            $table->string('description', 300)->nullable();  
            $table->string('photo', 200)->nullable();  
            $table->string('location', 100)->nullable();  
            $table->string('date', 100)->nullable();     
            
            $table->char('department_id', 2);
            $table->char('province_id', 4);
            $table->char('district_id', 6);
            
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('district_id')->references('id')->on('districts');

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
        Schema::dropIfExists('notices');
    }
}
