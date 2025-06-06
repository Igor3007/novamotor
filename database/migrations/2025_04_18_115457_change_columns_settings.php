<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('footer_text_left')->nullable();
            $table->string('footer_text_right')->nullable();


            $table->dropColumn('telegram');
            $table->dropColumn('whatsapp');
        });
    }


    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('whatsapp')->nullable();
            $table->string('telegram')->nullable();

            $table->dropColumn('footer_text_left');
            $table->dropColumn('footer_text_right');
        });
    }
};
