<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsHasAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands_has_addresses', function (Blueprint $table) {
            $table->id();
            $table->longText('address');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('brand_profile_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('brand_profile_id')->references('id')->on('brand_profiles');
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
        Schema::dropIfExists('brands_has_addresses');
    }
}
