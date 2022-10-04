<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('organization_id');
            $table->foreignId('property_id');
            $table->foreignId('contact_id');
            $table->string('status');
            $table->foreign('organization_id')->nullable()->references('id')->on('organizations');
            $table->foreign('property_id')->references('id')->on('properties');
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_contacts');
    }
}
