<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_number');

            $table->float('sub_amount');
            $table->float('vat')->default(0);
            $table->integer('discount')->default(0);
            $table->float('total_amount');

            $table->string('member_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_contact')->nullable();

            $table->string('payment_type');
            $table->integer('payment_amount');
            $table->float('payment_due')->default(0);

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
        Schema::dropIfExists('sells');
    }
}
