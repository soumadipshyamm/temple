<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temples', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->char('slug')->nullable();
            $table->string('name');
            $table->foreignId('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreignId('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreignId('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('postal_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('address');
            $table->longText('description')->nullable();
            $table->longText('history')->nullable();
            $table->longText('rules')->nullable();
            $table->longText('publication')->nullable();
            $table->longText('tradition')->nullable();
            $table->string('lat');
            $table->string('long');
            $table->string('img')->nullable();
            $table->string('openingsDay')->nullable();
            $table->string('openingTime')->nullable();
            $table->string('category_id')->nullable();
            $table->longText('consecrated_deity')->nullable();
            $table->longText('temple_existence')->nullable();
            $table->longText('special_poojas_sevas')->nullable();
            $table->longText('accommodation')->nullable();
            $table->longText('temple_transport')->nullable();
            $table->longText('temple_authority')->nullable();
            $table->longText('books_magazines')->nullable();
            $table->longText('temple_donations')->nullable();
            $table->longText('booking')->nullable();
            $table->tinyInteger('explore')->default(false)->comment('0:Inactive,1:Active')->nullable();
            $table->tinyInteger('is_active')->default(true)->comment('0:Inactive,1:Active')->nullable();
            $table->tinyInteger('is_approve')->default(true)->comment('0:Unapproved,1:Approved')->nullable();
            $table->tinyInteger('is_blocked')->default(false)->comment('0:Unblocked,1:Blocked')->nullable();
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
        Schema::dropIfExists('temples');
    }
}
