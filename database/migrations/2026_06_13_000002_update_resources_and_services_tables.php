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
        Schema::table('resources', function (Blueprint $table) {
            if (!Schema::hasColumn('resources', 'name')) {
                $table->string('name')->after('id');
            }
            if (!Schema::hasColumn('resources', 'type')) {
                $table->string('type')->after('name');
            }
            if (!Schema::hasColumn('resources', 'capacity')) {
                $table->integer('capacity')->after('type');
            }
            if (!Schema::hasColumn('resources', 'unit')) {
                $table->string('unit')->after('capacity');
            }
        });

        Schema::table('services', function (Blueprint $table) {
            if (!Schema::hasColumn('services', 'name')) {
                $table->string('name')->after('id');
            }
            if (!Schema::hasColumn('services', 'description')) {
                $table->text('description')->nullable()->after('name');
            }
            if (!Schema::hasColumn('services', 'price')) {
                $table->decimal('price', 10, 2)->after('description');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->dropColumn(['name', 'type', 'capacity', 'unit']);
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['name', 'description', 'price']);
        });
    }
};
