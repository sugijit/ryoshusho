<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6 text-right">
                        <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            新規作成
                        </a>
                    </div>

                    <!-- チェックボックス -->
                    <div class="mb-6">
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="toggleDeletedUsers" class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="ml-2 text-gray-700">削除されたユーザーを表示</span>
                        </label>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">名前</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">メール</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">作成日</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">操作</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $user)
                                @if(!$user->deleted_at)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->created_at->format('Y-m-d') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <form action="{{ route('users.edit', $user->id) }}" method="GET">
                                                @csrf
                                                @method('GET')
                                                <button type="submit" class="text-blue-500 hover:text-blue-700">編集</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>

                        <!-- 削除されたユーザー -->
                        <tbody id="deletedUsers" class="bg-red-50 divide-y divide-red-200 hidden">
                            @foreach ($users as $user)
                                @if($user->deleted_at)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->created_at->format('Y-m-d') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <!-- 編集フォーム -->
                                            <form action="{{ route('users.edit', $user->id) }}" method="GET">
                                                @csrf
                                                @method('GET')
                                                <button type="submit" class="text-blue-500 hover:text-blue-700">編集</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.getElementById('toggleDeletedUsers').addEventListener('change', function () {
            const deletedUsersTable = document.getElementById('deletedUsers');
            if (this.checked) {
                deletedUsersTable.classList.remove('hidden');
            } else {
                deletedUsersTable.classList.add('hidden');
            }
        });
    </script>
</x-app-layout>
