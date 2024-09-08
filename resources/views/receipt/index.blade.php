<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="w-full mb-6 flex !justify-between">
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="toggleDeletedReceipts" class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700 text-sm">削除された領収書を表示</span>
                        </label>
                        <a href="{{ route('receipts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            新規作成
                        </a>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-300 ">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">コード</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">宛先</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">額面</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">作成日</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">操作</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($receipts as $receipt)
                                @if(!$receipt->deleted_at)
                                    <tr class="odd:bg-white even:bg-gray-50 hover:bg-indigo-50 text-xs">
                                        <td class="px-6 py-2 whitespace-nowrap">{{ $receipt->code }}</td>
                                        <td class="px-6 py-2 whitespace-nowrap">{{ $receipt->client_company_name }}</td>
                                        <td class="px-6 py-2 whitespace-nowrap">{{ $receipt->receipt_value }}</td>
                                        <td class="px-6 py-2 whitespace-nowrap">{{ $receipt->created_at->format('Y-m-d') }}</td>
                                        <td class="px-6 py-2 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('receipts.show', $receipt) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">詳細</a>
                                            <a href="{{ route('receipts.edit', $receipt) }}" class="text-yellow-600 hover:text-yellow-900 mr-2">編集</a>
                                            <form action="{{ route('receipts.destroy', $receipt) }}" method="POST" class="inline" onsubmit="return confirm('本当に削除していいですか?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">削除</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tbody id="deletedReceipts" class="bg-red-50 divide-y divide-red-200 hidden">
                            @foreach ($receipts as $receipt)
                                @if($receipt->deleted_at)
                                    <tr class="odd:bg-red-50 even:bg-red-100 hover:bg-red-200 text-xs">
                                        <td class="px-6 py-2 whitespace-nowrap">{{ $receipt->code }}</td>
                                        <td class="px-6 py-2 whitespace-nowrap">{{ $receipt->client_company_name }}</td>
                                        <td class="px-6 py-2 whitespace-nowrap">{{ $receipt->receipt_value }}</td>
                                        <td class="px-6 py-2 whitespace-nowrap">{{ $receipt->created_at->format('Y-m-d') }}</td>
                                        <td class="px-6 py-2 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('receipts.show', $receipt) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">詳細</a>
                                            <a href="{{ route('receipts.edit', $receipt) }}" class="text-yellow-600 hover:text-yellow-900 mr-2">編集</a>
                                            <form action="{{ route('receipts.destroy', $receipt) }}" method="POST" class="inline" onsubmit="return confirm('本当に削除していいですか?');">
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
                    
                    {{ $receipts->links() }}
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