<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('full_title')->nullable();
            $table->text('full_description')->nullable();
            $table->float('min_price')->default(0);
            $table->integer('quantity')->default(0);
        });
    }


    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('full_title');
            $table->dropColumn('full_description');
            $table->dropColumn('min_price');
            $table->dropColumn('quantity');
        });
    }
};
