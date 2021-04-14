<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('uk')->unique();
            $table->integer('parent_id')->nullable();
            $table->string('name');
            $table->string('short_name');
            $table->string('description');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('website')->nullable();
            $table->datetime('founding');
            $table->string('rep_by');
            $table->string('fields');
            $table->enum('status', ['INIT','ACTIVED','FROZEN','BLOCK'])->default('INIT');
            $table->enum('type', [0, 1])->default(0);
            $table->string('avatar')->default('no_image.jpg');
            $table->string('banner')->default('no_image.jpg');
            $table->timestamps();
        });

        Schema::create('user_organization', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');            
            $table->unsignedBigInteger('organization_id');   
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('organizations');
        Schema::dropIfExists('user_organization');
    }
}
