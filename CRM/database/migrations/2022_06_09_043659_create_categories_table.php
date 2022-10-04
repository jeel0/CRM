<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->foreignId('contact_id');
            $table->foreignId('organization_id');
            $table->foreignId('task_id');
            $table->foreignId('report_id');
            $table->foreign('contact_id')->nullable()->references('id')->on('contacts');
            $table->foreign('organization_id')->nullable()->references('id')->on('organizations');
            $table->foreign('task_id')->nullable()->references('id')->on('tasks');
            $table->foreign('report_id')->nullable()->references('id')->on('report_users');
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
        Schema::dropIfExists('categories');
    }
}
