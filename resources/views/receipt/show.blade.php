<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Receipt Details') }}
        </h2>
    </x-slot> --}}

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6 text-right">
                        <a href="{{ route('receipts.printpdf', $receipt) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" target="_blank">
                            印刷
                        </a>
                    </div>
                    {{-- <a href="{{ route('receipts.printpdf', $receipt) }}" class="text-yellow-600 hover:text-yellow-900 mr-2" target="_blank">印刷</a> --}}
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">宛先: {{ $receipt->client_address }}</h3>
                        <h3 class="text-lg font-semibold">請求額: {{ $receipt->receipt_value }}</h3>
                    </div>
                    <div class="mb-4 md:flex md:gap-40">
                        <div>
                            <p><strong>営業所:</strong> {{ $receipt->branch }}</p>
                            <p><strong>課員:</strong> {{ $receipt->section_staff }}</p>
                            <p><strong>コード:</strong> {{ $receipt->code }}</p>
                            <p><strong>宛先:</strong> {{ $receipt->client_address }}</p>
                            <p><strong>発行日:</strong> {{ $receipt->issued_at }}</p>
                            <p><strong>額面:</strong> {{ $receipt->face_value }}</p>
                            <p><strong>備考:</strong> {{ $receipt->note }}</p>
                            <p><strong>請求額:</strong> {{ $receipt->receipt_value }}</p>
                            <p><strong>現金:</strong> {{ $receipt->cash_value }}</p>
                            <p><strong>小切手:</strong> {{ $receipt->cheque_value }}</p>
                        </div>
                        <div>
                            <p><strong>手形①:</strong> {{ $receipt->promissory_value1 }}</p>
                            <p><strong>期日①:</strong> {{ $receipt->promissory1_date }}</p>
                            <p><strong>振出人①:</strong> {{ $receipt->promissory_issuer1 }}</p>
                            <p><strong>手形②:</strong> {{ $receipt->promissory_value2 }}</p>
                            <p><strong>期日②:</strong> {{ $receipt->promissory2_date }}</p>
                            <p><strong>振出人②:</strong> {{ $receipt->promissory_issuer2 }}</p>
                            <p><strong>相殺:</strong> {{ $receipt->offset }}</p>
                            <p><strong>値引:</strong> {{ $receipt->discount }}</p>
                            <p><strong>その他:</strong> {{ $receipt->other }}</p>
                            {{-- <p><strong>Value:</strong> {{ $receipt->client_company_name }}</p> --}}
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('receipts.edit', $receipt) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">編集する</a>
                        <a href="{{ route('receipts.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">一覧に戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>