<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('uk')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->datetime('dob')->unique();
            $table->string('company')->unique()->comment('Cơ quan/ trường học');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('organization_id');
            $table->string('method')->comment('Kênh biết đến');
            $table->string('facebook')->unique();
            $table->string('address');
            $table->text('messages');
            $table->enum('status', ['WAITING', 'RESPONSE', 'SUCCESS', 'FAIL'])->default('WAITING');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
