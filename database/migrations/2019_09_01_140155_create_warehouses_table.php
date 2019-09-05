<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateWarehousesTable.
 */
class CreateWarehousesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('warehouses', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('province_id')->unsigned();
            $table->integer('district_id')->unsigned();
            $table->string('warehouse_code')->comment('Mã kho');
            $table->string('warehouse_name');
            $table->string('address');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('district_id')->references('id')->on('districts');
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
		Schema::drop('warehouses');
	}
}
