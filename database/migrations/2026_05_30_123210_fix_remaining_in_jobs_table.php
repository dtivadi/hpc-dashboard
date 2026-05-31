<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            // If cpu_hours doesn't exist yet, this adds it safely
            if (!Schema::hasColumn('jobs', 'cpu_hours')) {
                $table->integer('cpu_hours')->default(0)->after('id');
            }
            // This adds the memory_usage column that is causing the current error
            if (!Schema::hasColumn('jobs', 'memory_usage')) {
                $table->double('memory_usage')->default(0)->after('cpu_hours');
            }
        });
    }

    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn(['cpu_hours', 'memory_usage']);
        });
    }
};