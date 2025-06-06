<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->unsignedInteger('sorting')->default(0);
            $table->boolean('active')->default(true);
            $table->boolean('show_in_catalog')->default(true);
        });

        Schema::create('category_faq', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')->onDelete('cascade');

            $table->unsignedBigInteger('faq_id');
            $table->foreign('faq_id')
                ->references('id')
                ->on('faqs')->onDelete('cascade');
        });

        Schema::create('faq_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')->onDelete('cascade');

            $table->unsignedBigInteger('faq_id');
            $table->foreign('faq_id')
                ->references('id')
                ->on('faqs')->onDelete('cascade');
        });

    }

    public function down(): void
    {
        if(app()->isLocal()) {
            Schema::dropIfExists('faqs');
            Schema::dropIfExists('category_faq');
            Schema::dropIfExists('faq_product');
        }
    }
};
