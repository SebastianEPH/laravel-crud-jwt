<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->engine= 'InnoDB';
            $table->id();
//            $table-> bigInteger('id');
            $table-> string('username');
            $table->string('email')->unique();
//            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table-> bigInteger('persons_id')->unsigned();
            $table-> bigInteger('permissions_id')->unsigned();

//            $table->foreign('persons_id')->references('id')->on('persons')
//                ->onDelete('cascade')
//                ->onUpdate("cascade");
            $table->foreign('permissions_id')->references('id')->on('permissions')
                ->onDelete('cascade')
                ->onUpdate("cascade");

        });
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
