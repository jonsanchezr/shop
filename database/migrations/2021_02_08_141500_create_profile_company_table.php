<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_company', function (Blueprint $table) {
            $table->id();
            $table->string('name_trade', 255);
            $table->string('name_legal', 255);
            $table->string('email', 255);
            $table->string('phone_local', 255);
            $table->string('phone_mobile', 255)->nullable();
            $table->string('address_1', 255);
            $table->string('address_2', 255)->nullable();
            $table->string('city', 255);
            $table->string('region', 255)->nullable();
            $table->string('country', 255);
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
        Schema::dropIfExists('profile_company');
    }
}
