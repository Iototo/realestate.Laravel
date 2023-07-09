<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Requests\CreateUserRequest;
// 必要なuseステートメント

class RegisteredUserController extends Controller
{
    public function store(CreateUserRequest $request)
    {
        // バリデーション済みのデータを取得
        $validatedData = $request->validated();

        // ユーザーを作成
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'tel' => $validatedData['tel'],
            'role' => $validatedData['role'],
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('account.index');
    }

    // 他のメソッド...
}
