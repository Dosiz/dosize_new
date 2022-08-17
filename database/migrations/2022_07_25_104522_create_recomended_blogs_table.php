<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecomendedBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recomended_blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id');
            $table->foreign('blog_id')->references('id')->on('blogs');

            $table->unsignedBigInteger('recomended_blog_id')->nullable();
            $table->foreign('recomended_blog_id')->references('id')->on('blogs');

            $table->unsignedBigInteger('recomended_product_id')->nullable();
            $table->foreign('recomended_product_id')->references('id')->on('products');

            $table->unsignedBigInteger('brand_profile_id')->nullable();
            $table->foreign('brand_profile_id')->references('id')->on('brand_profiles');
            $table->string('type');
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
        Schema::dropIfExists('recomended_blogs');
    }
}
