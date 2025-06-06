<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('adv_text')->nullable();
            $table->string('catalog_h1')->nullable();
        });

        Schema::table('main_page_settings', function (Blueprint $table) {
            $table->dropColumn('adv_text');
        });
    }


    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('adv_text');
            $table->dropColumn('catalog_h1');
        });

        Schema::table('main_page_settings', function (Blueprint $table) {
            $table->string('adv_text')->nullable();;
        });
    }
};
