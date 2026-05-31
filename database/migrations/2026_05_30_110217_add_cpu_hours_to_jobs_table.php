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
        Schema::table('jobs', function (Blueprint $table) {
            // Adds cpu_hours if missing
            if (!Schema::hasColumn('jobs', 'cpu_hours')) {
                $table->integer('cpu_hours')->default(0);
            }
            
            // Adds memory_usage if missing
            if (!Schema::hasColumn('jobs', 'memory_usage')) {
                $table->double('memory_usage')->default(0);
            }

            // Adds status if missing
            if (!Schema::hasColumn('jobs', 'status')) {
                $table->string('status')->default('running');
            }

            // FIXES THE NEW ERROR: Adds resource_type if missing
            if (!Schema::hasColumn('jobs', 'resource_type')) {
                $table->string('resource_type')->default('CPU');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Left intentionally empty to prevent rollback crashes
    }
};