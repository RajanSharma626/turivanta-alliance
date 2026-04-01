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
            $table->boolean('same_as_billing')->default(false)->change();
        });
        
        // Update existing records where same_as_billing is still true (optional, but requested by user to be fixed)
        \DB::table('applications')->update(['same_as_billing' => false]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->boolean('same_as_billing')->default(true)->change();
        });
    }
};
