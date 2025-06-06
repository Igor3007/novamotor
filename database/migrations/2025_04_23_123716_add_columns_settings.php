<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('worktime')->nullable();
            $table->string('map')->nullable();
            $table->string('coordinates')->nullable();
        });
    }


    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('worktime');
            $table->dropColumn('map');
            $table->dropColumn('coordinates');
        });
    }
};
