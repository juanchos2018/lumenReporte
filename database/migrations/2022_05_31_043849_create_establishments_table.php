<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEstablishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->char('country_id', 2);
            $table->char('department_id', 2);
            $table->char('province_id', 4);
            $table->char('district_id', 6);
            $table->string('address');
            $table->string('email');
            $table->string('telephone');
            $table->string('code');
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('district_id')->references('id')->on('districts');

          
        });

        DB::table('establishments')->insert([
            'id' => 1,
            'description' => 'Municipalidad de Tacna',
            'country_id' => 'PE',
            'department_id' => '23',
            'province_id' => '2301',
            'district_id' => '230101',
            'address' => 'Avenida  Tacna',
            'email' => 'municipalidadTacna@gmail.com',
            'telephone' => '245588',
            'code' => '1',
          
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('establishments');
    }
}
