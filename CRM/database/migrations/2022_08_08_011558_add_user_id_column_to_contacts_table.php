<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('contacts', 'user_id')) {
            Schema::table('contacts', function (Blueprint $table) {
                $table->bigInteger('user_id')->after('id')->nullable();
            });
        }

        if (!Schema::hasColumn('contacts', 'last_modified_by')) {
            Schema::table('contacts', function (Blueprint $table) {
                $table->bigInteger('last_modified_by')->after('user_id')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('last_modified_by');
        });
    }
};
