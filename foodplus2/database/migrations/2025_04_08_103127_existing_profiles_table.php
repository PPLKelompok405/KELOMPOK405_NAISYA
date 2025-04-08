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
        if (!Schema::hasTable('profiles')) {
            Schema::create('profiles', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                $table->string('phone')->nullable();
                $table->string('address')->nullable();
                $table->json('preferences')->nullable();
                $table->timestamps();
            });
        } else {
            // Periksa dan tambahkan kolom yang mungkin belum ada
            if (!Schema::hasColumn('profiles', 'remember_token')) {
                Schema::table('profiles', function (Blueprint $table) {
                    $table->string('remember_token', 100)->nullable();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
