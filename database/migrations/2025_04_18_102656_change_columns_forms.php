<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('form_answers', function (Blueprint $table) {
            $table->text('message')->nullable()->change();
        });
    }


    public function down(): void
    {
        //
    }
};
