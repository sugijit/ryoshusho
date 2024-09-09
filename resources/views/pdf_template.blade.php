

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>ISODA | 領収書生成</title>
    <style>
        html {
            margin: 0;
            padding: 0;
        }
        @font-face {
            font-family: 'Noto Sans JP';
            font-style: normal;
            font-weight: 400;
            src: url({{ storage_path('fonts/NotoSansJP-Regular.ttf') }}) format('truetype');
        }
        body {
            font-family: 'Noto Sans JP', sans-serif;
            font-size: 0.7rem;
            margin: 0;
            padding: 0;
        }
        .bg-custom {
            background-image: url('{{ public_path('storage/images/template.png') }}');
            background-size: 100% 100%;
            background-position: center;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
        .absolute {
            position: absolute;
        }
        /* main */
            .print_count{
                margin-top: 110px;
                margin-left: 1550px;
                font-size: 1rem;
            }
            .issued_at_main{
                margin-top: 183px;
                margin-left: 1930px;
                font-size: 0.8rem;
            }
            .client_address_main {
                margin-top: 250px;
                margin-left: 340px;
                font-size: 0.8rem;
            }
            .face_value_main {
                margin-top: 420px;
                margin-left: 750px;
                font-size: 1rem;
            }
            .note_main {
                margin-top: 650px;
                margin-left: 570px;
            }

        /* 上 */
            .branch {
                margin-top: 1405px;
                margin-left: 500px;
            }
            .branch_right {
                margin-top: 1405px;
                margin-left: 1800px;
            }
            .section_staff {
                margin-top: 1475px;
                margin-left: 500px;
            }
            .code {
                margin-top: 1545px;
                margin-left: 500px;
            }
            .client_address {
                margin-top: 1615px;
                margin-left: 500px;
            }
            .issued_at {
                margin-top: 1685px;
                margin-left: 500px;
            }
            .issued_at_right {
                margin-top: 1405px;
                margin-left: 1550px;
            }
            .face_value {
                margin-top: 1755px;
                margin-left: 500px;
            }
            .receipt_value {
                margin-top: 1475px;
                margin-left: 1620px;
            }
            .cash_value {
                margin-top: 1545px;
                margin-left: 1620px;
            }
            .cheque_value {
                margin-top: 1615px;
                margin-left: 1620px;
            }
            .promissory_value1 {
                margin-top: 1685px;
                margin-left: 1620px;
            }
            .promissory1_date {
                margin-top: 1685px;
                margin-left: 2050px;
            }
            .promissory_issuer1 {
                margin-top: 1755px;
                margin-left: 1620px;
            }
            .promissory_value2 {
                margin-top: 1825px;
                margin-left: 1620px;
            }
            .promissory2_date {
                margin-top: 1825px;
                margin-left: 2050px;
            }
            .promissory_issuer2 {
                margin-top: 1895px;
                margin-left: 1620px;
            }
            .offset {
                margin-top: 1965px;
                margin-left: 1620px;
            }
            .discount {
                margin-top: 2035px;
                margin-left: 1620px;
            }
            .other {
                margin-top: 2105px;
                margin-left: 1620px;
            }
        /* 下 */
            .below_branch, .below_branch_right, .below_issued_date_right {
                margin-top: 2480px !important;
            }
            .below_section_staff, .below_receipt_value {
                margin-top: 2550px !important;
            }
            .below_code, .below_cash_value {
                margin-top: 2620px !important;
            }
            .below_client_address, .below_cheque_value {
                margin-top: 2683px !important;
            }
            .below_issued_at, .below_promissory_value1, .below_promissory1_date {
                margin-top: 2748px !important;
            }
            .face_value, .below_promissory_issuer1 {
                margin-top: 2818px !important;
            }
            .below_promissory_value2, .below_promissory2_date {
                margin-top: 2882px !important;
            }
            .below_promissory_issuer2 {
                margin-top: 2950px !important;
            }
            .below_offset {
                margin-top: 3015px !important;
            }
            .below_discount {
                margin-top: 3080px !important;
            }
            .below_other {
                margin-top: 3145px !important;
            }
    </style>
</head>
<body>
    <div class="bg-custom">
        <div class="fureemu">
            {{-- main --}}
            @if ($receiptData->print_count >= 1)
                <div class="absolute print_count">
                    （ 再発行 ）
                </div>
            @endif
            <div class="absolute issued_at_main">
                {{ $receiptData->issued_at }}
            </div>
            <div class="absolute client_address_main">
                {{ $receiptData->client_address }}
            </div>
            <div class="absolute face_value_main">
                {{ number_format($receiptData->face_value) }} 円
            </div>
            <div class="absolute note_main">
                {{ $receiptData->note }}
            </div>
            {{-- 上 --}}
            <div class="absolute branch">
                {{ $receiptData->branch }}
            </div>
            <div class="absolute branch_right">
                {{ $receiptData->branch }}
            </div>
            <div class="absolute section_staff">
                {{ $receiptData->section_staff }}
            </div>
            <div class="absolute code">
                {{ $receiptData->code }}
            </div>
            <div class="absolute client_address">
                {{ $receiptData->client_address }}
            </div>
            <div class="absolute issued_at">
                {{ $receiptData->issued_at }}
            </div>
            <div class="absolute issued_at_right">
                {{ $receiptData->issued_at }}
            </div>
            <div class="absolute face_value">
                {{ number_format($receiptData->face_value) }} 円
            </div>
            <div class="absolute receipt_value">
                {{ number_format($receiptData->receipt_value) }} 円
            </div>
            <div class="absolute cash_value">
                {{ number_format($receiptData->cash_value) }} 円
            </div>
            <div class="absolute cheque_value">
                {{ number_format($receiptData->cheque_value) }} 円
            </div>
            <div class="absolute promissory_value1">
                {{ number_format($receiptData->promissory_value1) }} 円
            </div>
            <div class="absolute promissory1_date">
                {{ $receiptData->promissory1_date }}
            </div>
            <div class="absolute promissory_issuer1">
                {{ $receiptData->promissory_issuer1 }}
            </div>
            <div class="absolute promissory_value2">
                {{ number_format($receiptData->promissory_value2) }} 円
            </div>
            <div class="absolute promissory2_date">
                {{ $receiptData->promissory2_date }}
            </div>
            <div class="absolute promissory_issuer2">
                {{ $receiptData->promissory_issuer2 }}
            </div>
            <div class="absolute offset">
                {{ number_format($receiptData->offset) }}
            </div>
            <div class="absolute discount">
                {{ number_format($receiptData->discount) }}
            </div>
            <div class="absolute other">
                {{ number_format($receiptData->other) }}
            </div>

            {{-- 下 --}}
            <div class="absolute branch below_branch">
                {{ $receiptData->branch }}
            </div>
            <div class="absolute branch_right below_branch_right">
                {{ $receiptData->branch }}
            </div>
            <div class="absolute section_staff below_section_staff">
                {{ $receiptData->section_staff }}
            </div>
            <div class="absolute code below_code">
                {{ $receiptData->code }}
            </div>
            <div class="absolute client_address below_client_address">
                {{ $receiptData->client_address }}
            </div>
            <div class="absolute issued_at below_issued_at">
                {{ $receiptData->issued_at }}
            </div>
            <div class="absolute issued_at_right below_issued_date_right">
                {{ $receiptData->issued_at }}
            </div>
            <div class="absolute face_value below_face_value">
                {{ number_format($receiptData->face_value) }} 円
            </div>
            <div class="absolute receipt_value below_receipt_value">
                {{ number_format($receiptData->receipt_value) }} 円
            </div>
            <div class="absolute cash_value below_cash_value">
                {{ number_format($receiptData->cash_value) }} 円
            </div>
            <div class="absolute cheque_value below_cheque_value">
                {{ number_format($receiptData->cheque_value) }} 円
            </div>
            <div class="absolute promissory_value1 below_promissory_value1">
                {{ number_format($receiptData->promissory_value1) }} 円
            </div>
            <div class="absolute promissory1_date below_promissory1_date">
                {{ $receiptData->promissory1_date }}
            </div>
            <div class="absolute promissory_issuer1 below_promissory_issuer1">
                {{ $receiptData->promissory_issuer1 }}
            </div>
            <div class="absolute promissory_value2 below_promissory_value2">
                {{ number_format($receiptData->promissory_value2) }} 円
            </div>
            <div class="absolute promissory2_date below_promissory2_date">
                {{ $receiptData->promissory2_date }}
            </div>
            <div class="absolute promissory_issuer2 below_promissory_issuer2">
                {{ $receiptData->promissory_issuer2 }}
            </div>
            <div class="absolute offset below_offset">
                {{ number_format($receiptData->offset) }}
            </div>
            <div class="absolute discount below_discount">
                {{ number_format($receiptData->discount) }}
            </div>
            <div class="absolute other below_other">
                {{ number_format($receiptData->other) }}
            </div>
        </div>
    </div>
</body>
</html>



    