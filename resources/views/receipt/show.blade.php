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
                        <a href="{{ route('receipts.printpdf', $receipt) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            target="_blank">
                            印刷
                        </a>
                    </div>
                    {{-- <a href="{{ route('receipts.printpdf', $receipt) }}"
                        class="text-yellow-600 hover:text-yellow-900 mr-2" target="_blank">印刷</a> --}}
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">宛先: {{ $receipt->client_address }}</h3>
                        <h3 class="text-lg font-semibold">請求額: {{ number_format($receipt->receipt_value) }}</h3>
                    </div>
                    <div class="mb-12 grid grid-cols-1 md:grid-cols-2 gap-12">
                        <!-- 左側のテーブル -->
                        <div>
                            <table class="min-w-full table-auto border-collapse border border-gray-300">
                                <tbody>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">営業所</th>
                                        <td class="px-4 py-2 border-b">{{ $receipt->branch }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">課員</th>
                                        <td class="px-4 py-2 border-b">{{ $receipt->section_staff }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">コード</th>
                                        <td class="px-4 py-2 border-b">{{ $receipt->code }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">宛先</th>
                                        <td class="px-4 py-2 border-b">{{ $receipt->client_address }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">発行日</th>
                                        <td class="px-4 py-2 border-b">{{ $receipt->issued_at }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">額面</th>
                                        <td class="px-4 py-2 border-b">{{ number_format($receipt->face_value) }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">備考</th>
                                        <td class="px-4 py-2 border-b">{{ $receipt->note }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">請求額</th>
                                        <td class="px-4 py-2 border-b">{{ number_format($receipt->receipt_value) }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">現金</th>
                                        <td class="px-4 py-2 border-b">{{ number_format($receipt->cash_value) }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">小切手</th>
                                        <td class="px-4 py-2 border-b">{{ number_format($receipt->cheque_value) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- 右側のテーブル -->
                        <div>
                            <table class="min-w-full table-auto border-collapse border border-gray-300">
                                <tbody>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">手形①</th>
                                        <td class="px-4 py-2 border-b">{{ number_format($receipt->promissory_value1) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">期日①</th>
                                        <td class="px-4 py-2 border-b">{{ $receipt->promissory1_date }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">振出人①</th>
                                        <td class="px-4 py-2 border-b">{{ $receipt->promissory_issuer1 }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">手形②</th>
                                        <td class="px-4 py-2 border-b">{{ number_format($receipt->promissory_value2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">期日②</th>
                                        <td class="px-4 py-2 border-b">{{ $receipt->promissory2_date }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">振出人②</th>
                                        <td class="px-4 py-2 border-b">{{ $receipt->promissory_issuer2 }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">相殺</th>
                                        <td class="px-4 py-2 border-b">{{ number_format($receipt->offset) }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">値引</th>
                                        <td class="px-4 py-2 border-b">{{ number_format($receipt->discount) }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-left bg-gray-100 border-b">その他</th>
                                        <td class="px-4 py-2 border-b">{{ number_format($receipt->other) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('receipts.edit', $receipt) }}"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">編集する</a>
                        <a href="{{ route('receipts.index') }}"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">一覧に戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>