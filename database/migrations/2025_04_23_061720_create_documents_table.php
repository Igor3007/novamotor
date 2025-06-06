<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')
                ->references('id')
                ->on('document_groups')->onDelete('cascade');
            $table->string('title');
            $table->text('text')->nullable();
            $table->string('file');
            $table->unsignedInteger('sorting');
            $table->boolean('active')->default(true);
        });
    }

    public function down(): void
    {
        if(app()->isLocal()) {
            Schema::dropIfExists('documents');
        }
    }
};
