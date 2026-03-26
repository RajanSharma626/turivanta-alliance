<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->string('breach_full_name')->nullable()->after('fiduciary_breach');
            $table->string('breach_concerned_company')->nullable()->after('breach_full_name');
            $table->string('breach_relationship')->nullable()->after('breach_concerned_company');
            $table->string('breach_tax_id')->nullable()->after('breach_relationship');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn(['breach_full_name', 'breach_concerned_company', 'breach_relationship', 'breach_tax_id']);
        });
    }
};
