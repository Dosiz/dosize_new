<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities'); 
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->longText('brand_logo');
            $table->longText('brand_image');
            $table->longText('color')->nullable();
            $table->longText('font')->nullable();
            $table->longText('description');
            $table->longText('address');
            $table->integer('whatsapp_no')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('brand_profiles');
    }
}
