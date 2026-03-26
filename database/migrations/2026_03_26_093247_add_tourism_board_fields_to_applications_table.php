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
            $table->boolean('tourism_board_registered')->default(false)->after('iata_registered');
            $table->string('tourism_board_name')->nullable()->after('tourism_board_registered');
            $table->string('tourism_board_reg_no')->nullable()->after('tourism_board_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn(['tourism_board_registered', 'tourism_board_name', 'tourism_board_reg_no']);
        });
    }
};
