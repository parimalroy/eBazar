<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducttsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name',100);
            $table->integer('categorie_id');
            $table->integer('manufacture_id');
            $table->float('product_price',10,2);
            $table->integer('product_quantity');
            $table->text('product_short_description');
            $table->text('product_description');
            $table->text('product_main_image');
            $table->text('product_image1');
            $table->text('product_image2');
            $table->tinyInteger('publication_status');
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
        Schema::dropIfExists('productts');
    }
}
