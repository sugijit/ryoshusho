<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ユーザー一覧を表示（ソフトデリートを考慮）
    public function index()
    {
        $users = User::withTrashed()->get(); // ソフトデリートされたユーザーも含める
        return view('user.index', compact('users'));
    }

    // ユーザー作成フォームを表示
    public function create()
    {
        return view('user.create');
    }

    // ユーザーを保存
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|max:50', // roleフィールドを追加
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->role = $validatedData['role']; // roleを保存
        $user->save();

        return redirect()->route('users.index')->with('success', 'ユーザーが作成されました');
    }

    // ユーザー情報を表示
    public function show($id)
    {
        $user = User::withTrashed()->findOrFail($id); // ソフトデリートを考慮
        return view('users.show', compact('user'));
    }

    // ユーザー編集フォームを表示
    public function edit($id)
    {
        $user = User::withTrashed()->findOrFail($id); // ソフトデリートを考慮
        return view('user.edit', compact('user'));
    }

    // ユーザー情報を更新
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|max:50', // roleフィールドを追加
        ]);

        $user = User::withTrashed()->findOrFail($id); // ソフトデリートを考慮
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role = $validatedData['role']; // roleを更新
        if ($validatedData['password']) {
            $user->password = bcrypt($validatedData['password']);
        }
        $user->save();

        return redirect()->route('users.index')->with('success', 'ユーザーが更新されました');
    }

    // ユーザーをソフトデリート
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // ソフトデリート

        return redirect()->route('users.index')->with('success', 'ユーザーが削除されました');
    }

    // ユーザーを復元
    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore(); // 復元

        return redirect()->route('users.index')->with('success', 'ユーザーが復元されました');
    }
}
