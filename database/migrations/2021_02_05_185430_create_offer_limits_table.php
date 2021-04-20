<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferLimitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_limits', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('subtitle', 255);
            $table->string('description', 255);
            $table->string('url', 255);
            $table->string('image', 255);
            $table->timestamp('date_end', 0)->nullable();
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
        Schema::dropIfExists('offer_limits');
    }
}
