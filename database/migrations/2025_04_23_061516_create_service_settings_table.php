<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_settings', function (Blueprint $table) {
            $table->id();
            $table->string('service_partner')->nullable();
            $table->string('service_address')->nullable();
            $table->string('image')->nullable();
            $table->text('text1')->nullable();
            $table->text('text2')->nullable();
        });
    }

    public function down(): void
    {
        if(app()->isLocal()) {
            Schema::dropIfExists('service_settings');
        }
    }
};
