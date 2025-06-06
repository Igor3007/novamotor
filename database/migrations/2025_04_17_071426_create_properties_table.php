<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedInteger('sorting');
            $table->boolean('active')->default(true);
            $table->boolean('show_in_category')->default(true);
        });

        Schema::create('product_property', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')->onDelete('cascade');

            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')
                ->references('id')
                ->on('properties')->onDelete('cascade');

            $table->string('value')->nullable();
        });
    }

    public function down(): void
    {
        if(app()->isLocal()) {
            Schema::dropIfExists('product_property');
            Schema::dropIfExists('properties');
        }
    }
};
