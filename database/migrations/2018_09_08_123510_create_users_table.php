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
         Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');

            $table->string('current_address')->nullable();
            $table->string('parmanent_address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('type');
             $table->integer('added_by');
             $table->integer('updated_by')->nullable();
            $table->string("image")->nullable();
             $table->boolean("status")->default('1');
             $table->boolean("deleted_by")->nullable();

           // $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
