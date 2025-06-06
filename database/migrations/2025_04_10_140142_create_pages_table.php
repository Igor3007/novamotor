<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title');
            $table->string('slug')->unique();
            $table->text('text');
            $table->boolean('active');
        });
    }

    public function down(): void
    {
        if(app()->isLocal()) {
            Schema::dropIfExists('pages');
        }
    }
};
