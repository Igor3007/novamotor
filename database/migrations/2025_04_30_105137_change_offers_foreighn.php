<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropForeign('offers_product_id_foreign');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        //
    }
};
