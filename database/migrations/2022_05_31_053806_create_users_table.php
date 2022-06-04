<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');   
            $table->string('number_document', 12)->nullable();  
            $table->string('name', 300)->nullable();
            $table->string('last_name', 300)->nullable();
            $table->string('user', 300)->nullable();
            $table->string('email', 150)->unique();
            $table->string('password', 200);
            $table->string('phone', 15)->nullable();
            $table->string('location', 100)->nullable();
            $table->string('lat', 100)->nullable();
            $table->string('lon', 100)->nullable();
            $table->string('photo', 100)->nullable();
            $table->integer('state');
            $table->string('api_token',60)->unique();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'id' => 1,
            'number_document' => '45713877',
            'name' => 'yulino',
            'last_name' => 'Quiroz',
            'user' => 'yulino',
            'email' => 'yulino@gmail.com',
            'password' => Hash::make('123456'),
            'phone' => '970782688',
            'location' => 'Avenia Arequipa SN',
            'lat' => '-18.0278393',
            'lon' => '-70.2522103',
            'photo' => 'default',
            'state' => 1,
            'api_token' =>  Str::random(60),
            'state' => 1,
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
