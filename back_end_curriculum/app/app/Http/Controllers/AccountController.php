<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountUpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUserRequest;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['delete', 'index', 'create']); // 管理者であることを確認
    }

    public function delete($id)
    {
        $account = User::findOrFail($id);

        // ログインユーザーが一般ユーザーで、かつ編集対象のアカウントがログインユーザー自身のアカウントでない場合、エラーを返す
        // if (Auth::user()->role === 2 && Auth::user()->id !== $account->id) {
        //     abort(403);
        // }

        $account->delete();

        return redirect()->route('account.index');
    }

    public function edit($id)
    {
        $account = User::findOrFail($id);

        // ログインユーザーが一般ユーザーで、かつ編集対象のアカウントがログインユーザー自身のアカウントでない場合、エラーを返す
        // if (Auth::user()->role === 2 && Auth::user()->id !== $account->id) {
        //     abort(403);
        // }

        return view('account.edit', ['account' => $account]);
    }


    public function update(AccountUpdateRequest $request, $id)
    {
        $account = User::findOrFail($id);

        // ログインユーザーが一般ユーザーで、かつ編集対象のアカウントがログインユーザー自身のアカウントでない場合、エラーを返す
        // if (Auth::user()->role === 2 && Auth::user()->id !== $account->id) {
        //     abort(403);
        // }

        $account->name = $request->input('name');
        $account->email = $request->input('email');
        if ($request->filled('password')) {
            $account->password = Hash::make($request->input('password'));
        }
        $account->tel = $request->input('tel');
        if (Auth::user()->role === 1) {
            $account->role = $request->input('role');
        }
        $account->save();

        return redirect()->route('account.edit', ['id' => $account->id])->with('success', 'アカウントが更新されました');
    }

    public function show($id)
    {
        $account = User::findOrFail($id);
        return view('account.spec', ['account' => $account]);
    }

    public function exportCsv()
    {
        // ヘッダー情報
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=accounts.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        // アカウントデータを取得
        $accounts = User::all();

        // コールバックを使用してCSVファイルを生成
        $callback = function() use ($accounts) {
            // 出力バッファをopen
            $file = fopen('php://output', 'w');
            foreach ($accounts as $account) {
                $roleName = $account->role;
                if ($roleName === 1){
                    $roleName = "管理者";
                }elseif($roleName === 2){
                    $roleName = "一般";
                }
            fputcsv($file, [$account->name, $account->email, $account->tel, $roleName]);
            }
            fclose($file);
        };

        // レスポンスを返す
        return response()->stream($callback, 200, $headers);
    }

    public function index()
    {
        // ユーザーデータを取得
        $accounts = User::paginate(10); // 1ページあたり10件のデータを取得
        return view('account.index', ['accounts' => $accounts]);
    }

    public function customregist()
    {
        return view('custom.regist');
    }

    public function store(CreateUserRequest $request)
    {
        // バリデーションがパスしたら、ここに到達します。
        // バリデーションが失敗すると、自動的に前のページにリダイレクトされます。

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tel' => $request->tel,
            'role' => $request->role,
        ]);

        return redirect()->route('account.index')->with('success', '登録されました');
    }

    // public function spec()
    // {
    //     return view('account/spec');
    // }

    public function customlogin()
    {
        return view('custom.login');

    }

}