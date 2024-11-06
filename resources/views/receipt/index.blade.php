<x-app-layout>

        <style>
  input[type="date"]::placeholder {
    font-size: 0.35rem; /* Tailwindのtext-xs相当 */
  }
  .codee::placeholder {
    font-size: 0.65rem;
  }
</style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 !pt-4 bg-white border-b border-gray-200 text-sm">
                    <div class="w-full mb-6 flex flex-col sm:flex-row justify-between">
                        <label class="inline-flex items-center mb-4 sm:mb-0">
                            <input type="checkbox" id="toggleDeletedReceipts"
                                class="form-checkbox h-3 w-3 text-blue-600">
                            <span class="ml-2 text-gray-700 text-sm">削除された領収書を表示</span>
                        </label>
                        <form action="{{ route('receipt.search') }}" method="GET" class="flex flex-wrap items-center space-x-2">
                            <div class="w-full sm:max-w-24 mb-2 sm:mb-0 sm:mr-2">
                                <input type="text" name="code" placeholder="コード" value="{{ request('code') }}" class="w-full shadow appearance-none border rounded py-[2px] px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder:text-xs codee">
                            </div>
                            <div class="w-full sm:w-auto flex flex-wrap items-center mb-2 sm:mb-0 !ml-0 sm:ml-2">
                                <span class="w-full sm:w-auto">作成日</span>
                                <input type="date" name="date_from" value="{{ request('date_from') }}" class="w-full sm:w-auto shadow appearance-none border rounded py-1 sm:px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-xs placeholder-gray-500">
                                <span class="w-full sm:w-auto sm:!mx-1">から</span>
                                <input type="date" name="date_to" value="{{ request('date_to') }}" class="w-full sm:w-auto shadow appearance-none border rounded py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-xs placeholder-gray-500">
                            </div>
                            <div class="w-full sm:w-auto !ml-0 sm:!ml-2">
                                <button type="submit" class="w-full sm:w-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-[3px] px-4 rounded text-[0.8rem]">検索</button>
                            </div>
                            @if(request('code') || request('date_from') || request('date_to'))
                                <div class="w-full sm:w-auto !ml-0 sm:!ml-2">
                                    <a href="{{ route('receipt.index') }}" class="w-full sm:w-auto bg-red-500 hover:bg-red-700 text-white font-bold py-[6px] px-4 rounded  text-[0.8rem]">検索解除</a>
                                </div>
                            @endif
                        </form>
                        <a href="{{ route('receipts.create') }}" class="w-full sm:w-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded mt-2 sm:mt-0">
                            新規作成
                        </a>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-300 ">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    コード</th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    宛先</th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    額面</th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    差額</th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    作成日</th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    印刷数</th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    操作</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($receipts as $receipt)
                            @if(!$receipt->deleted_at)
                            <tr class="odd:bg-white even:bg-gray-50 hover:bg-indigo-50 text-sm">
                                <td class="px-6 py-2 whitespace-nowrap">{{ $receipt->code }}</td>
                                <td class="px-6 py-2 whitespace-nowrap">{{ $receipt->client_address }}</td>
                                <td class="px-6 py-2 whitespace-nowrap">{{ "¥".number_format($receipt->face_value) }}
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">{{ "¥ ".number_format($receipt->receipt_value - $receipt->cash_value - $receipt->cheque_value -
                                $receipt->promissory_value1 - $receipt->promissory_value2 - $receipt->offset - $receipt->discount -
                                $receipt->other) }}
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">{{ $receipt->created_at->format('Y-m-d') }}</td>
                                <td class="px-6 py-2 whitespace-nowrap">{{ $receipt->print_count }}</td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('receipts.show', $receipt) }}"
                                        class="text-indigo-600 hover:text-indigo-900 mr-2">詳細</a>
                                    <a href="{{ route('receipts.edit', $receipt) }}"
                                        class="text-yellow-600 hover:text-yellow-900 mr-2">編集</a>
                                    @if(Auth::user()->role == 'admin')
                                        <form action="{{ route('receipts.destroy', $receipt) }}" method="POST"
                                            class="inline" onsubmit="return confirm('本当に削除していいですか?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">削除</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                        <tbody id="deletedReceipts" class="bg-red-50 divide-y divide-red-200 hidden">
                            @foreach ($receipts as $receipt)
                            @if($receipt->deleted_at)
                            <tr class="odd:bg-red-50 even:bg-red-100 hover:bg-red-200 text-sm">
                                <td class="px-6 py-2 whitespace-nowrap">{{ $receipt->code }}</td>
                                <td class="px-6 py-2 whitespace-nowrap">{{ $receipt->client_address }}</td>
                                <td class="px-6 py-2 whitespace-nowrap">{{ $receipt->face_value }}</td>
                                <td class="px-6 py-2 whitespace-nowrap">{{ "¥ ".number_format($receipt->receipt_value - $receipt->cash_value -
                                    $receipt->cheque_value -
                                    $receipt->promissory_value1 - $receipt->promissory_value2 - $receipt->offset - $receipt->discount -
                                    $receipt->other) }}
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">{{ $receipt->created_at->format('Y-m-d') }}</td>
                                <td class="px-6 py-2 whitespace-nowrap">{{ $receipt->print_count }}</td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('receipts.show', $receipt) }}"
                                        class="text-indigo-600 hover:text-indigo-900 mr-2">詳細</a>
                                    <a href="{{ route('receipts.edit', $receipt) }}"
                                        class="text-yellow-600 hover:text-yellow-900 mr-2">編集</a>
                                    <form action="{{ route('receipts.destroy', $receipt) }}" method="POST"
                                        class="inline" onsubmit="return confirm('本当に削除していいですか?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">削除</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-6">{{ $receipts->links() }}</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggleDeletedReceipts').addEventListener('change', function () {
            const deletedReceipts = document.getElementById('deletedReceipts');
            if (this.checked) {
                deletedReceipts.classList.remove('hidden');
            } else {
                deletedReceipts.classList.add('hidden');
            }
        });
    </script>
</x-app-layout>