<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realestate</title>
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/forgot_PW.css') }}" rel="stylesheet">
</head>

<body>
    <main>
        <div class="top">
            <div class="inner1000 flex">
                <div>
                    <a href={{route('property.index')}}>物件情報</a>
                    @if(Auth::check() && Auth::user()->role === 1)
                        <a href={{route('account.index')}}>アカウント情報</a>
                    @endif
                </div>

                @php
                    use App\Models\User;
                    $user = Auth::user();
                    $accountName = $user ? $user->name : '';
                    $roleName = $user ? $user->role : '';
                    if ($roleName === 1){
                        $roleName = "管理者";
                    }elseif($roleName === 2){
                        $roleName = "一般";
                    }
                @endphp

                <div class="flex">
                    <div>
                        <small>{{ $accountName }}</small>
                        <small>{{ $roleName }}</small>
                    </div>
                    @guest
                        <a href={{route('login')}}>ログイン</a>
                        <a href={{route('register')}}>新規登録</a>
                    @else
                        <form method="POST" action={{route('logout')}}>
                            @csrf
                            <button type="submit">ログアウト</button>
                        </form>
                    @endguest
                </div>
            </div>            </div>
        </div>



        @yield('content')



    </main>
</body>

</html>

<!-- このファイルが共通のレイアウトファイル -->