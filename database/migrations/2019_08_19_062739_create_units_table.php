<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUnitsTable.
 */
class CreateUnitsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('units', function(Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->integer('active')->default(1);
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
		Schema::drop('units');
	}
}
