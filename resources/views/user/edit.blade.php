<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <h2 class="text-2xl font-bold mb-6">ユーザー情報を編集</h2>
                        <div>
                            @if($user->trashed())
                                <form action="{{ route('users.restore', $user->id) }}" method="POST" onsubmit="return confirm('ユーザーを復活させていいですか?');">
                                    @csrf
                                    <button type="submit" class="px-4 pt-2 pb-1 bg-blue-400 rounded-lg text-sm">復元</button>
                                </form>
                            @else
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('本当に削除していいですか?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 pt-2 pb-1 bg-red-400 rounded-lg text-sm" >削除</button>
                                </form>
                            @endif
                        </div>
                    </div>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- 名前 -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">名前</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- メールアドレス -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">メールアドレス</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- パスワード -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">パスワード</label>
                <input type="password" name="password" id="password"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- パスワード確認 -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">パスワード確認</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- 役割（role） -->
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">役割</label>
                <select name="role" id="role"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>管理者</option>
                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>一般ユーザー</option>
                </select>
                @error('role')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 更新ボタン -->
            <div class="mt-6">
                <button type="submit"
                        class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    更新する
                </button>
            </div>
        </form>

        <!-- キャンセルボタン -->
        <div class="mt-4 text-center">
            <a href="{{ route('users.index') }}"
               class="text-blue-500 hover:text-blue-700">キャンセル</a>
        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>