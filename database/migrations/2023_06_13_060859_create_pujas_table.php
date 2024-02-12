<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePujasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pujas', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->char('slug')->nullable();
            $table->foreignId('temple_id')->references('id')->on('temples')->onDelete('cascade');
            $table->longText('description')->nullable();
            $table->string('live_strimeng_link')->nullable();
            $table->string('puja_start_date')->nullable();
            $table->string('puja_end_date')->nullable();
            $table->string('puja_start_time')->nullable();
            $table->string('puja_end_time')->nullable();
            $table->string('thumbnals')->nullable();
            // $table->foreignId('event_id')->references('id')->on('events')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('pujas');
    }
}
