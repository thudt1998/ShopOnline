<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->float('rate')->default(5.0)->after('product_name');
            $table->string('origin')->comment('xuất sứ');
            $table->bigInteger('brand_id')->unsigned()->nullable()->after('product_name');
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'rate')) {
                $table->dropColumn('rate');
            }
            if (Schema::hasColumn('products', 'origin')) {
                $table->dropColumn('origin');
            }
            if (Schema::hasColumn('products', 'brand_id')) {
                $table->dropForeign('products_brand_id_foreign');
                $table->dropColumn('brand_id');
            }
        });
    }
}
