<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->unsignedInteger('sorting');
            $table->boolean('active')->default(true);
        });
    }

    public function down(): void
    {
        if(app()->isLocal()) {
            Schema::dropIfExists('vacancies');
        }
    }
};
