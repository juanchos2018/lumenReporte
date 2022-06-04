<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');   
            $table->string('descrition', 100)->nullable();  
            $table->string('logo', 100)->nullable();  
            $table->timestamps();
        });


        DB::table('organizations')->insert([
            'id' => 1,
            'descrition' => 'Ambulancia',
            'logo' => 'upload/ambulancia.png'          
        ]);
        
        DB::table('organizations')->insert([
            'id' => 2,
            'descrition' => 'Bombero',
            'logo' => 'upload/bombero.png'          
        ]);

        DB::table('organizations')->insert([
            'id' => 3,
            'descrition' => 'Seguridad',
            'logo' => 'upload/seguridad.png'          
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
}
