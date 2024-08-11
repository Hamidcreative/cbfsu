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
        Schema::table('authorities', function (Blueprint $table) {
            $table->integer('customer_id')->nullable()->after('id');;
            $table->integer('design_build')->nullable();
            $table->integer('hazmat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('authorities', function (Blueprint $table) {
            //
        });
    }
};
