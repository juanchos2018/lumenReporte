<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;



class CreateTypeIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_incidences', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');   
            $table->string('descrition', 100)->nullable();  
            $table->string('logo', 100)->nullable();  
            $table->timestamps();
        });

        DB::table('type_incidences')->insert([
            'id' => 1,
            'descrition' => 'Vandalismo',
            'logo' => 'default'          
        ]);
        DB::table('type_incidences')->insert([
            'id' => 2,
            'descrition' => 'Acoso Sexual',
            'logo' => 'default'          
        ]);
        DB::table('type_incidences')->insert([
            'id' => 3,
            'descrition' => 'Robo o Hurto',
            'logo' => 'default'          
        ]);
        DB::table('type_incidences')->insert([
            'id' => 4,
            'descrition' => 'Extorsion',
            'logo' => 'default'          
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_incidences');
    }
}
