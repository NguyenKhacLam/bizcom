<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('uk')->unique();
            $table->unsignedBigInteger('class_id');
            $table->string('name');
            $table->datetime('dob');
            $table->string('company');
            $table->string('address');
            $table->string('phone');
            $table->string('email')->unique();
            $table->integer('amount')->comment('Số tiền đã đóng');
            $table->integer('left')->comment('Số tiền còn lại');
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
