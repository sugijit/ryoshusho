<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ユーザー一覧を表示（ソフトデリートを考慮）
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            $users = User::withTrashed()->get(); // ソフトデリートされたユーザーも含める
            return view('user.index', compact('users'));
        } else {
            return back();
        }
    }

    // ユーザー作成フォームを表示
    public function create()
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            return view('user.create');
        } else {
            return back();
        }
    }

    // ユーザーを保存
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
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
        } else {
            return back();
        }
    }

    // ユーザー情報を表示
    public function show($id)
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            $user = User::withTrashed()->findOrFail($id); // ソフトデリートを考慮
            return view('users.show', compact('user'));
        } else {
            return back();
        }
    }

    // ユーザー編集フォームを表示
    public function edit($id)
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            $user = User::withTrashed()->findOrFail($id); // ソフトデリートを考慮
            return view('user.edit', compact('user'));
        } else {
            return back();
        }
    }

    // ユーザー情報を更新
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
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
        } else {
            return back();
        }
    }

    // ユーザーをソフトデリート
    public function destroy($id)
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            $user = User::findOrFail($id);
            $user->delete(); // ソフトデリート

            return redirect()->route('users.index')->with('success', 'ユーザーが削除されました');
        } else {
            return back();
        }
    }

    // ユーザーを復元
    public function restore($id)
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            $user = User::withTrashed()->findOrFail($id);
            $user->restore(); // 復元

            return redirect()->route('users.index')->with('success', 'ユーザーが復元されました');
        } else {
            return back();
        }
    }
}
