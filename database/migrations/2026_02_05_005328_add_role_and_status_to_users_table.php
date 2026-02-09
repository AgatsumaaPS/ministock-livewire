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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user')->after('is_admin'); // 'admin', 'user'
            $table->string('status')->default('pending')->after('role'); // 'pending', 'active'
        });

        // Migrate existing data
        DB::table('users')->where('is_admin', true)->update([
            'role' => 'admin',
            'status' => 'active'
        ]);
        
        DB::table('users')->where('is_admin', false)->update([
            'role' => 'user',
            'status' => 'pending'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'status']);
        });
    }
}