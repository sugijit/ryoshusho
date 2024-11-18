<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ISODA | 領収書生成</title>
        <style>
            html {
                margin: 0;
                padding: 0;
            }
            @font-face {
                font-family: "Noto Sans JP";
                font-style: normal;
                font-weight: 400;
                src: url({{storage_path("fonts/NotoSansJP-Regular.ttf")}})
                    format("truetype");
            }
            body {
                font-family: "Noto Sans JP", sans-serif;
                font-size: 0.7rem;
                margin: 0;
                padding: 0;
            }
            .bg-custom {
                background-image: url("{{ public_path("storage/images/template.png") }}");
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
            .print_count {
                margin-top: 15px;
                margin-left: 1550px;
                font-size: 1rem;
            }

            .issued_at_main {
                margin-top: 105px;
                margin-left: 1930px;
                font-size: 0.8rem;
            }

            .client_address_main {
                margin-top: 175px;
                margin-left: 340px;
                font-size: 1rem;
            }

            .face_value_main {
                margin-top: 335px;
                text-align: right;
                right: 40%;
                font-size: 1.3rem;
            }

            /* 表示しない */
            .note_main {
                margin-top: 585px;
                margin-left: 570px;
            }
            .company_number {
                margin-top: 850px;
                margin-left: 1580px;
                font-size: 0.6rem;
            }

            /* left top */
            .lefttop {
                margin-top: 1375px;
                margin-left: 620px;
                font-size: 0.9rem;
                line-height: 1.1rem;
            }
            /* left bottom */
            .leftbottom {
                margin-top: 2530px;
                margin-left: 620px;
                font-size: 0.9rem;
                line-height: 1.05rem;
            }

            .issued_at_right-top {
                margin-top: 1370px;
                margin-left: 1530px;
            }
            .issued_at_right-bottom {
                margin-top: 2490px;
                margin-left: 1530px;
            }

            /* right top */
            .right-top {
                margin-top: 1450px;
                right: 630px;
                line-height: 0.9rem;
                text-align: right;
            }
            .rr-top {
                margin-top: 1735px;
                margin-left: 2050px;
                line-height: 0.9rem;
                text-align: right;
            }
            /* right bottom */
            .right-bt {
                margin-top: 2556px;
                right: 630px;
                line-height: 0.88rem;
                text-align: right;
            }
            .rr-bt {
                margin-top: 2835px;
                margin-left: 2050px;
                line-height: 0.9rem;
                text-align: right;
            }
        </style>
    </head>

    <body>
        <div class="bg-custom">
            <div class="fureemu">
                {{-- main --}}
                @if ($receiptData->print_count >= 1)
                <div class="absolute print_count">（ 再発行 ）</div>
                @endif
                <div class="absolute issued_at_main">
                    {{ $receiptData->issued_at }}
                </div>
                <div class="absolute client_address_main">
                    {{ $receiptData->client_address }}
                </div>
                <div class="absolute face_value_main">
                    ¥{{ number_format($receiptData->face_value) }} ※
                </div>
                <div class="absolute note_main">
                    {{ $receiptData->note }}
                </div>

                {{-- 左上 --}}
                <div class="absolute lefttop">
                    <div class="">
                        {{ $receiptData->branch }}
                    </div>
                    <div class="">
                        {{ $receiptData->section_staff }}
                    </div>
                    <div class="">
                        {{ $receiptData->code }}
                    </div>
                    <div class="">
                        {{ $receiptData->client_address }}
                    </div>
                    <div class="">
                        {{ $receiptData->issued_at }}
                    </div>
                    <div class="">
                        {{ number_format($receiptData->face_value) }} 円
                    </div>
                </div>
                {{-- 左上 --}}
                <div class="absolute leftbottom">
                    <div class="">
                        {{ $receiptData->branch }}
                    </div>
                    <div class="">
                        {{ $receiptData->section_staff }}
                    </div>
                    <div class="">
                        {{ $receiptData->code }}
                    </div>
                    <div class="">
                        {{ $receiptData->client_address }}
                    </div>
                    <div class="">
                        {{ $receiptData->issued_at }}
                    </div>
                    <div class="">
                        {{ number_format($receiptData->face_value) }} 円
                    </div>
                </div>

                <div class="absolute issued_at_right-top">
                    {{ $receiptData->issued_at }}
                </div>
                <div class="absolute issued_at_right-bottom">
                    {{ $receiptData->issued_at }}
                </div>

                <div class="absolute right-top">
                    <div class="">
                        {{ number_format($receiptData->receipt_value) }} 円
                    </div>
                    <div class="">
                        {{ (number_format($receiptData->cash_value) == 0) ? "-" : number_format($receiptData->cash_value)." 円" }}
                    </div>
                    <div class="">
                        {{ (number_format($receiptData->cheque_value) == 0) ? "-" : number_format($receiptData->cheque_value)." 円" }}
                    </div>
                    <div class="">
                        {{ (number_format($receiptData->promissory_value1) == 0) ? "-" : number_format($receiptData->promissory_value1)." 円" }}
                    </div>
                    <div class="">
                        {{ $receiptData->promissory_issuer1 ?? "-"}}
                    </div>
                    <div class="">
                        {{ (number_format($receiptData->promissory_value2) == 0) ? "-" : number_format($receiptData->promissory_value2)." 円" }}
                    </div>

                    <div class="">
                        {{ ($receiptData->promissory_issuer2) ?? "-"}}
                    </div>
                    <div class="">
                        {{ (number_format($receiptData->offset) == 0) ? "-" : number_format($receiptData->offset)." 円" }}
                    </div>
                    <div class="">
                        {{ (number_format($receiptData->discount) == 0) ? "-" : number_format($receiptData->discount)." 円" }}
                    </div>
                    <div class="">
                        {{ (number_format($receiptData->other) == 0) ? "-" : number_format($receiptData->other)." 円" }}
                    </div>
                    <div class="">
                        {{ number_format($receiptData->receipt_value - $receiptData->cash_value - $receiptData->cheque_value - $receiptData->promissory_value1 - $receiptData->promissory_value2 - $receiptData->offset - $receiptData->discount - $receiptData->other) }}
                        円
                    </div>
                </div>
                <div class="absolute rr-top">
                    <div class="">
                        {{ $receiptData->promissory1_date ?? "-" }}
                    </div>
                    <br />
                    <div class="">
                        {{ $receiptData->promissory2_date ?? "-" }}
                    </div>
                </div>

                <!-- door -->
                <div class="absolute right-bt">
                    <div class="">
                        {{ number_format($receiptData->receipt_value) }} 円
                    </div>
                    <div class="">
                        {{ (number_format($receiptData->cash_value) == 0) ? "-" : number_format($receiptData->cash_value)." 円" }}
                    </div>
                    <div class="">
                        {{ (number_format($receiptData->cheque_value) == 0) ? "-" : number_format($receiptData->cheque_value)." 円" }}
                    </div>
                    <div class="">
                        {{ (number_format($receiptData->promissory_value1) == 0) ? "-" : number_format($receiptData->promissory_value1)." 円" }}
                    </div>
                    <div class="">
                        {{ $receiptData->promissory_issuer1 ?? "-"}}
                    </div>
                    <div class="">
                        {{ (number_format($receiptData->promissory_value2) == 0) ? "-" : number_format($receiptData->promissory_value2)." 円" }}
                    </div>

                    <div class="">
                        {{ ($receiptData->promissory_issuer2) ?? "-"}}
                    </div>
                    <div class="">
                        {{ (number_format($receiptData->offset) == 0) ? "-" : number_format($receiptData->offset)." 円" }}
                    </div>
                    <div class="">
                        {{ (number_format($receiptData->discount) == 0) ? "-" : number_format($receiptData->discount)." 円" }}
                    </div>
                    <div class="">
                        {{ (number_format($receiptData->other) == 0) ? "-" : number_format($receiptData->other)." 円" }}
                    </div>
                    <div class="">
                        {{ number_format($receiptData->receipt_value - $receiptData->cash_value - $receiptData->cheque_value - $receiptData->promissory_value1 - $receiptData->promissory_value2 - $receiptData->offset - $receiptData->discount - $receiptData->other) }}
                        円
                    </div>
                </div>
                <div class="absolute rr-bt">
                    <div class="">
                        {{ $receiptData->promissory1_date ?? "-" }}
                    </div>
                    <br />
                    <div class="">
                        {{ $receiptData->promissory2_date ?? "-" }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
