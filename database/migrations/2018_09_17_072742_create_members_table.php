<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('member_id');
            $table->string('name');
            $table->string('current_address')->nullable();
            $table->string('parmanent_address')->nullable();
            $table->string('contact_number')->nullable();

            $table->date('registration_date')->nullable();
            $table->date('bookissue_date')->nullable();
            $table->integer('registration_fee');

            $table->integer('added_by');
            $table->integer('updated_by')->nullable();


            $table->string("image")->nullable();
            $table->boolean("status")->default('1');
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
        Schema::dropIfExists('members');
    }
}
