<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_name');
            $table->string('type');
            $table->string('color');
            $table->binary('user_image');
            $table->timestamps();
            $table->bigInteger('user_id')->references('id')->on('users')->nullable();
        });
        DB::statement("ALTER TABLE images MODIFY COLUMN user_image longblob");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}

