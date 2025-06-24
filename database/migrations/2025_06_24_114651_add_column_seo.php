<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('seo', function (Blueprint $table) {
            $table->string('seo_block_title')->nullable();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('seo_block_title');
            $table->dropColumn('seo_block_description');
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('seo_block_title')->nullable();
            $table->text('seo_block_description')->nullable();
        });

        Schema::table('seo', function (Blueprint $table) {
            $table->dropColumn('seo_block_title');
        });
    }
};
