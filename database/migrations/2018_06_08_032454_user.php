<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("TB_USER",function(Blueprint $table){
            $table->increments('ID');
            $table->string("NAME");
            $table->string("LAST_NAME");
            $table->string("EMAIL");
            $table->string("PASSWORD");            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("TB_USER");
    }
}
