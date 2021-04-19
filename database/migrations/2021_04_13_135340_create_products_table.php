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
            $table->unsignedBigInteger('business_id');
            $table->string('name', 255);
            $table->text('ingredients', 512);
            $table->text('description', 1024);
            $table->float('price', 6, 2);
            $table->boolean('visible', true);
            $table->text('img', 2048);
            $table->timestamps();

            $table->foreign('business_id')
              ->references('id')
              ->on('businesses');
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
