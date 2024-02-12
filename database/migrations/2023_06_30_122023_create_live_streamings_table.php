<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveStreamingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_streamings', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('title')->nullable();;
            $table->string('live_url')->nullable();
            $table->date('start_date')->nullable();
            $table->time('start_time')->nullable();
            $table->string('thumbnail_img')->nullable();
            $table->unsignedBigInteger('temple_id');
            $table->foreign('temple_id')->references('id')->on('temples')->cascadeOnDelete();
            $table->foreignId('user_id')->unsignedBigInteger()->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('puja_id')->references('id')->on('pujas')->onDelete('cascade')->cascadeOnDelete();
            $table->tinyInteger('is_active')->default(true)->comment('0:Inactive,1:Active')->nullable();
            $table->tinyInteger('is_approve')->default(true)->comment('0:Unapproved,1:Approved')->nullable();
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
        Schema::dropIfExists('live_streamings');
    }
}
