<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('decoding_file')->nullable();
            $table->text('common_props')->nullable();
        });
    }


    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('decoding_file');
            $table->dropColumn('common_props');
        });
    }
};
