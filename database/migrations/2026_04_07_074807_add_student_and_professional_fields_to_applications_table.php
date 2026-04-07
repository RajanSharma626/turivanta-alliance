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
            $table->date('admission_date')->nullable();
            $table->string('college_name')->nullable();
            $table->string('course_duration')->nullable();
            $table->date('joining_industry_date')->nullable();
            $table->string('first_company_name')->nullable();
            $table->string('current_company_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn([
                'admission_date',
                'college_name',
                'course_duration',
                'joining_industry_date',
                'first_company_name',
                'current_company_name'
            ]);
        });
    }
};
