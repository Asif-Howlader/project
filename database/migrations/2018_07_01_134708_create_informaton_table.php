<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Faker\DefaultGenerator;

class CreateInformatonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Department')->default('null');
            $table->date('DOFB')->default('12-12-12');
            $table->string('Gender')->default('null');
            $table->string('Address')->default('null');
            $table->string('phone')->default('null');
            $table->string('image')->default('null');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('Users');
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
        Schema::dropIfExists('Information');
    }
}
