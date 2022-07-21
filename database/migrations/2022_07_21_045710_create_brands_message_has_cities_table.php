<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsMessageHasCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands_message_has_cities', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');

            $table->unsignedBigInteger('brand_profile_id')->nullable();
            $table->foreign('brand_profile_id')->references('id')->on('brand_profiles');
            
            $table->unsignedBigInteger('brand_message_id')->nullable();
            $table->foreign('brand_message_id')->references('id')->on('brand_messages');
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
        Schema::dropIfExists('brands_message_has_cities');
    }
}
