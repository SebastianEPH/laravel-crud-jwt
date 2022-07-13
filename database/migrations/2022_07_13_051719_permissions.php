<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Permissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions',function(Blueprint $table){
            $table->engine= 'InnoDB';
            $table-> bigIncrements('id');
            $table-> string('name');
            $table-> string('description');
            $table-> set('permissions',['read','write','update','delete']);
            $table-> set('products',['read','write','update','delete']);
            $table-> set('users',['read','write','update','delete']);
            $table-> set('persons',['read','write','update','delete']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
