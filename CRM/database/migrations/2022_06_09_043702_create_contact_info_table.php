<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('contact_id');
            $table->date('first_inquiry_date')->nullable();
            $table->string('prospect_name')->nullable();
            $table->integer('prospect_age')->nullable();
            $table->string('prospect_relationship')->nullable();
            $table->string('suite_preference')->nullable();
            $table->string('lifestyle_option')->nullable();
            $table->string('marketing_source')->nullable();
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
        Schema::dropIfExists('contact_info');
    }
}
