<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('seo', function (Blueprint $table) {
            $table->string('h1')->nullable();
        });

        Schema::table('main_page_settings', function (Blueprint $table) {
            $table->dropColumn('h1');
        });
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('catalog_h1');
        });
    }

    public function down(): void
    {
        Schema::table('seo', function (Blueprint $table) {
            $table->dropColumn('h1');
        });

        Schema::table('main_page_settings', function (Blueprint $table) {
            $table->string('h1')->nullable();
        });
        Schema::table('settings', function (Blueprint $table) {
            $table->string('catalog_h1')->nullable();
        });
    }
};
