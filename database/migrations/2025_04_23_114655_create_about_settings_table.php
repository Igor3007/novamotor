<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_settings', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->json('phones')->nullable();
            $table->string('btn_text')->nullable();
            $table->string('btn_url')->nullable();
        });
    }

    public function down(): void
    {
        if(app()->isLocal()) {
            Schema::dropIfExists('about_settings');
        }
    }
};
