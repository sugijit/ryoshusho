

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
        .code {
            margin-top: 200px;
        }
    </style>
</head>
<body>
    <div class="bg-custom">
        <div class="fureemu">
            <div class="absolute code">
                {{ $receiptData->code }} この場合はどうしたらいい？
            </div>
        </div>
    </div>
</body>
</html>



    