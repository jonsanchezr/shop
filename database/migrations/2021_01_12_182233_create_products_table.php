<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('brand_id');
            $table->string('title', 255);
            $table->string('short_description', 255);
            $table->text('large_description');
            $table->float('amount', 15, 2);
            $table->integer('unit');
            $table->string('slug', 255)->unique();
            $table->string('slot_image_1', 255);
            $table->string('slot_image_2', 255)->nullable();
            $table->string('slot_image_3', 255)->nullable();
            $table->string('slot_image_4', 255)->nullable();
            $table->string('slot_video', 255)->nullable();
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
        Schema::dropIfExists('products');
    }
}
