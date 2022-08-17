<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandTimmingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_timmings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_profile_id');
            $table->foreign('brand_profile_id')->references('id')->on('brand_profiles');
            $table->longText('sat_thu_mor_open');
            $table->longText('sat_thu_mor_close');
            $table->longText('sat_thu_noon_open');
            $table->longText('sat_thu_noon_close');
            $table->string('friday_open');
            $table->string('friday_close');
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
        Schema::dropIfExists('brand_timmings');
    }
}
