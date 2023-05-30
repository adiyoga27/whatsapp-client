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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('store_address');
            $table->string('maps');
            $table->string('email');
            $table->string('phone_cs_1');
            $table->string('web_name');
            $table->string('sub_web_name');
            $table->string('section1_img')->nullable();
            $table->string('section_name_3');
            $table->string('section_title_3');
            $table->string('section_description_3');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('template');
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
        Schema::dropIfExists('profiles');
    }
};
