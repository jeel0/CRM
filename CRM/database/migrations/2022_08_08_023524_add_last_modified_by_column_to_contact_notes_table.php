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
        if (!Schema::hasColumn('contact_notes', 'last_modified_by')) {
            Schema::table('contact_notes', function (Blueprint $table) {
                $table->bigInteger('last_modified_by')->after('author')->nullable();
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
        Schema::table('contact_notes', function (Blueprint $table) {
            $table->dropColumn('last_modified_by');
        });
    }
};
