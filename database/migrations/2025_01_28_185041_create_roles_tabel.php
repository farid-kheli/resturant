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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('rolename');
            $table->timestamps();
        });

        // Insert default roles
        DB::table('roles')->insert([
            ['rolename' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
            ['rolename' => 'Staff', 'created_at' => now(), 'updated_at' => now()],
            ['rolename' => 'User', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
