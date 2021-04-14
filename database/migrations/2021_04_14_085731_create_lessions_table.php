<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessions', function (Blueprint $table) {
            $table->id();
            $table->string('uk')->unique();
            $table->unsignedBigInteger('class_id');
            $table->string('name');
            $table->unsignedBigInteger('teacher');
            $table->unsignedBigInteger('assistant')->nullable()->comment('Trợ giảng');
            $table->string('attendant')->comment('Người tham gia. lưu dưới dạng 1,2,3,... đầy là student_ids');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->text('description');
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
        Schema::dropIfExists('lessions');
    }
}
