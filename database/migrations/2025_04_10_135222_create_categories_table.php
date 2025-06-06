<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('sorting');
            $table->boolean('active')->default(true);
            $table->string('price_list')->nullable();
        });
    }

    public function down(): void
    {
        if(app()->isLocal()) {
            Schema::dropIfExists('categories');
        }
    }
};
