<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('main_page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('form_title')->nullable();
            $table->string('form_text')->nullable();
            $table->string('about_image')->nullable();
            $table->text('about_text')->nullable();
            $table->string('about_btn_title')->nullable();
            $table->string('about_btn_url')->nullable();
            $table->string('adv_text')->nullable();
            $table->string('h1')->nullable();
        });
    }

    public function down(): void
    {
        if(app()->isLocal()) {
            Schema::dropIfExists('main_page_settings');
        }
    }
};
