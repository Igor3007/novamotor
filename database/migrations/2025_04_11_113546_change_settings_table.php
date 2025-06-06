<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::dropIfExists('settings');
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('slogan_image')->nullable();
            $table->string('slogan_text')->nullable();
            $table->string('email')->nullable();
            $table->json('phones')->nullable();
            $table->text('address')->nullable();
            $table->text('copyright_text')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('telegram')->nullable();
            $table->text('metric_head')->nullable();
            $table->text('metric_body')->nullable();
            $table->text('metric_footer')->nullable();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
