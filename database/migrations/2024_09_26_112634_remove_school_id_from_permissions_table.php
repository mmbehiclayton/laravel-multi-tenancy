<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveSchoolIdFromPermissionsTable extends Migration
{
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            // Remove the foreign key constraint first, then drop the column
            $table->dropForeign(['school_id']);
            $table->dropColumn('school_id');
        });
    }

    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            // Re-add the school_id column and foreign key
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade');
        });
    }
}
