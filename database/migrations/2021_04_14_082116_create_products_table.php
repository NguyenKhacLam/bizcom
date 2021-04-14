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
            $table->string('uk')->unique();
            $table->string('name');
            $table->string('short_name');
            $table->unsignedBigInteger('category_id');
            $table->integer('unit_price');
            $table->integer('tax_rate');
            $table->integer('tax_price');
            $table->enum('status', ['INIT','ACTIVED','FROZEN','BLOCK'])->default('ACTIVED');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
