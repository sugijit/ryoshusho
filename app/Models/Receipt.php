<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    // テーブル名を指定
    protected $table = 'receipts';

    // マスアサインメントを許可する属性
    protected $fillable = [
        'user_id',
        'branch',
        'section_staff',
        'code',
        'client_address',
        'issued_at',
        'client_company_name',
        'face_value',
        'cash_value',
        'cheque_value',
        'promissory_value1',
        'promissory1_date',
        'promissory_issuer1',
        'promissory_value2',
        'promissory2_date',
        'promissory_issuer2',
        'tax',
        'receipt_value',
    ];

    // 日付属性をキャスト
    protected $dates = [
        'issued_at',
        'promissory1_date',
        'promissory2_date',
    ];
}
