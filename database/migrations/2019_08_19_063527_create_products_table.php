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
            $table->bigInteger('unit_id')->unsigned();
            $table->string('name');
            $table->string('product_code');
            $table->string('barcode');
            $table->decimal('price');
            $table->text('description');
            $table->integer('warning_out_of_stock');
            $table->integer('weight')->default(null);
            $table->integer('volume')->default(null);
            $table->foreign('product_group_id')->references('id')->on('product_groups');
            $table->foreign('unit_id')->references('id')->on('units');
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
        Schema::drop('products');
    }
}
