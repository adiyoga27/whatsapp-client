<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('shipping_subdistrict_id')->nullable();
            $table->string('shipping_province_name')->nullable();
            $table->string('shipping_city_name')->nullable();
            $table->string('shipping_subdistrict_name')->nullable();
            $table->string('shipping_expedition')->nullable();
            $table->integer('shipping_fee')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('shipping_subdistrict_id');
            $table->dropColumn('shipping_subdistrict_id');
            $table->dropColumn('shipping_city_name');
            $table->dropColumn('shipping_province_name');
            $table->dropColumn('customer_expedition');
            $table->dropColumn('shipping_fee');
        });
    }
};
