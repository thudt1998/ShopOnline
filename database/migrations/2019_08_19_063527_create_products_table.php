<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProductsTable.
 */
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
            $table->bigIncrements('id');
            $table->bigInteger('product_group_id')->unsigned();
            $table->string('product_name');
            $table->string('product_code');
            $table->string('barcode');
            $table->double('price');
            $table->longText('description');
            $table->integer('warning_out_of_stock')->default(0);
            $table->integer('weight')->default(null)->nullable();
            $table->integer('volume')->default(null)->nullable();
            $table->foreign('product_group_id')->references('id')->on('product_groups');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
