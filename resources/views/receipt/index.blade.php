<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('RECEIPT BLADE INDEX') }}
        </h2>
    </x-slot> --}}

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6 text-right">
                        <a href="{{ route('receipts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            新規作成
                        </a>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">コード</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">お客様</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">金額</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">作成日</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">操作</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($receipts as $receipt)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $receipt->code }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $receipt->client_company_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $receipt->receipt_value }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $receipt->created_at->format('Y-m-d') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('receipts.show', $receipt) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">詳細</a>
                                        <a href="{{ route('receipts.edit', $receipt) }}" class="text-yellow-600 hover:text-yellow-900 mr-2">編集</a>
                                        <a href="{{ route('receipts.printpdf', $receipt) }}" class="text-yellow-600 hover:text-yellow-900 mr-2" target="_blank">印刷</a>
                                        <form action="{{ route('receipts.destroy', $receipt) }}" method="POST" class="inline" onsubmit="return confirm('本当に削除していいですか?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $receipts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
