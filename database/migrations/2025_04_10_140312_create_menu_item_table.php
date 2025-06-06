<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->string('title');
            $table->string('url');
            $table->unsignedInteger('sorting');
            $table->unsignedBigInteger('parent_id')->default(0);

            $table->foreign('menu_id')->references('id')->on('menus')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        if(app()->isLocal()) {
            Schema::dropIfExists('menu_items');
        }
    }
};
