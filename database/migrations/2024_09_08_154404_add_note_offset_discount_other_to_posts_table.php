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
            $table->string('note', 255)->comment('備考')->after('face_value')->nullable();
            $table->string('other', 255)->comment('その他')->after('promissory_issuer2')->nullable();
            $table->string('discount', 255)->comment('値引')->after('promissory_issuer2')->nullable();
            $table->string('offset', 255)->comment('相殺')->after('promissory_issuer2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->dropColumn('note');
            $table->dropColumn('other');
            $table->dropColumn('discount');
            $table->dropColumn('offset');
        });
    }
};
