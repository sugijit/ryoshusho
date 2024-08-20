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
        Schema::create('receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('branch', 255)->comment('営業所');
            $table->string('section_staff', 255)->comment('課員');
            $table->string('code', 255)->comment('コード');
            $table->string('client_address', 255)->comment('宛先');
            $table->date('issued_at')->nullable()->comment('日付');
            $table->string('client_company_name', 255)->comment('お客様名（企業名）');
            $table->integer('face_value')->nullable()->comment('額面');
            $table->integer('cash_value')->nullable()->comment('現金');
            $table->integer('cheque_value')->nullable()->comment('小切手');
            $table->integer('promissory_value1')->nullable()->comment('手形1');
            $table->date('promissory1_date')->nullable()->comment('手形1期日');
            $table->integer('promissory_issuer1')->nullable()->comment('振出人1');
            $table->integer('promissory_value2')->nullable()->comment('手形2');
            $table->date('promissory2_date')->nullable()->comment('手形2期日');
            $table->integer('promissory_issuer2')->nullable()->comment('振出人2');
            $table->integer('tax')->nullable()->comment('消費税');
            $table->integer('receipt_value')->nullable()->comment('領収額');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
