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
//        Schema::table('bonds', function (Blueprint $table) {
//            $table->dropColumn('delivery_method');
//        });
//        Schema::table('bonds', function (Blueprint $table) {
//            $table->text('delivery_method')->nullable();
//        });

        //DB::statement('ALTER TABLE bonds ALTER COLUMN delivery_method TYPE TEXT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bonds', function (Blueprint $table) {
            //
        });
    }
};
