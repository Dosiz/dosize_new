<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsHasCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs_has_cities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('brand_profile_id')->nullable();
            $table->unsignedBigInteger('blog_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('blog_id')->references('id')->on('blogs');
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
        Schema::dropIfExists('blogs_has_cities');
    }
}
