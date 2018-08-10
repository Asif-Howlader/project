<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submitions', function (Blueprint $table) {
            $table->increments('id');           
            $table->integer('user_id');
            $table->integer('problem_id');
            $table->dateTime('submited_time');
            $table->text('submited_code')->nullable();
            $table->integer('state')->default(0);
            $table->integer('t_val')->default(0);
            $table->rememberToken('_token');
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
        Schema::dropIfExists('submitions');
    }
}
