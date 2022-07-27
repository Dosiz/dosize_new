<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_messages', function (Blueprint $table) {
            $table->id();
            $table->longText('message');

            $table->unsignedBigInteger('brand_profile_id')->nullable();
            $table->foreign('brand_profile_id')->references('id')->on('brand_profiles');
            
            $table->date('end_date');
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
        Schema::dropIfExists('brand_messages');
    }
}
