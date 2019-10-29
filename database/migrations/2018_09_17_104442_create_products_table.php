<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_id');
            $table->string('product_name');
            $table->string('product_type')->nullable();
            $table->string('product_description')->nullable();
            $table->integer('buying_price');
            $table->integer('selling_price');
            $table->integer('start_quantity');

            $table->integer('added_by');
            $table->integer('updated_by')->nullable();





            $table->boolean("status")->default('1');
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
        Schema::dropIfExists('products');
    }
}
