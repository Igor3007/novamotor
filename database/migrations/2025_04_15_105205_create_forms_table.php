<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('form_answers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('page');
            $table->string('form_name');

            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('message');

        });
    }

    public function down(): void
    {
        if(app()->isLocal()) {
            Schema::dropIfExists('form_answers');
        }
    }
};
