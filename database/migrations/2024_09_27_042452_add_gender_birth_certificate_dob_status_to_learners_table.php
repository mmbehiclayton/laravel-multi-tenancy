<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('learners', function (Blueprint $table) {
            // Add gender column if it doesn't already exist
            if (!Schema::hasColumn('learners', 'gender')) {
                $table->enum('gender', ['male', 'female'])->after('name');
            }

            // Add birth_certificate_number column if it doesn't already exist
            if (!Schema::hasColumn('learners', 'birth_certificate_number')) {
                $table->string('birth_certificate_number')->unique()->after('gender');
            }

            // Add date_of_birth column if it doesn't already exist
            if (!Schema::hasColumn('learners', 'date_of_birth')) {
                $table->date('date_of_birth')->nullable()->after('birth_certificate_number');
            }

            // Add status column if it doesn't already exist
            if (!Schema::hasColumn('learners', 'status')) {
                $table->enum('status', ['active', 'inactive', 'suspended'])->default('active')->after('date_of_birth');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('learners', function (Blueprint $table) {
            // Drop columns if they exist
            if (Schema::hasColumn('learners', 'gender')) {
                $table->dropColumn('gender');
            }

            if (Schema::hasColumn('learners', 'birth_certificate_number')) {
                $table->dropColumn('birth_certificate_number');
            }

            if (Schema::hasColumn('learners', 'date_of_birth')) {
                $table->dropColumn('date_of_birth');
            }

            if (Schema::hasColumn('learners', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};

