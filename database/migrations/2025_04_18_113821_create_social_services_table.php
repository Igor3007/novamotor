<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_services', function (Blueprint $table) {
            $table->id();
            $table->string('icon');
            $table->string('url');
            $table->unsignedInteger('sorting');
            $table->boolean('active')->default(true);
        });
    }

    public function down(): void
    {
        if(app()->isLocal()) {
            Schema::dropIfExists('social_services');
        }
    }
};
