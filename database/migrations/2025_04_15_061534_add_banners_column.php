<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->text('text')->nullable();
        });
    }


    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('text');
        });
    }
};
