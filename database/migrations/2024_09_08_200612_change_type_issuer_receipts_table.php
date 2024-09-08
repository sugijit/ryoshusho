<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->string('promissory_issuer1')->nullable()->comment('振出人1')->change();
            $table->string('promissory_issuer2')->nullable()->comment('振出人2')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->dropColumn('promissory_issuer1');
            $table->dropColumn('promissory_issuer2');
        });
    }
};
