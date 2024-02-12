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
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('user_id')->unsigned()->references('id')->on('users')->constrained()->cascadeOnDelete();
            $table->string('media_id')->nullable();;
            $table->string('media_path')->nullable();
            $table->string('media_type')->nullable();
            $table->string('file_name')->nullable();
            $table->string('media_details')->nullable();
            $table->string('page_name')->nullable();
            $table->foreignId('page_id')->unsigned()->references('id')->on('temples')->constrained()->cascadeOnDelete();
            $table->timestamps();
            // $table->softDeletes();
        });
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
