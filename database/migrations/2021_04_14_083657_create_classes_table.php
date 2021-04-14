<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('uk')->unique();
            $table->string('name');
            $table->unsignedBigInteger('teacher');
            $table->unsignedBigInteger('assistant')->nullable();
            $table->string('calendar')->comment('Lịch học cố định. Lưu dưới dạng string array. Data là các thứ trong tuần');
            $table->string('classroom')->comment('Phòng học');
            $table->string('duration')->comment('Thời lượng');
            $table->string('price')->nullable()->comment('Giá');
            // Sẽ bổ sung chúc năng quản lý các dụng cụ sau
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('organization_id');
            $table->text('description');
            $table->enum('status', ['INIT', 'IN_PROCESS', 'CLOSE', 'CANCLE'])->default('INIT');
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
        Schema::dropIfExists('classes');
    }
}
