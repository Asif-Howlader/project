<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email',191)->unique();
            $table->string('password');
            $table->string('user_type',5)->default('user');            
            $table->string('Department')->default('null');
            $table->date('DOFB')->default('12-12-12');
            $table->string('Gender')->default('null');
            $table->string('Address')->default('null');
            $table->string('phone')->default('null');
            $table->string('Image')->default('1.png');
            $table->rememberToken();
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
        Schema::dropIfExists('Users');
    }
}
