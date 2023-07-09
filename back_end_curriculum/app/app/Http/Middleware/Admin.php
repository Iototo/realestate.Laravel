<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 1) {
            return $next($request);
        }

        return redirect('/property')->with('error', '管理者権限がありません。'); // 管理者でない場合、ホーム画面にリダイレクト
    }
}
