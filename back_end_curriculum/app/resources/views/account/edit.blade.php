@extends('layouts.realestate')

@section('content')
<div class="inner1000 content">
    <h1>アカウント編集画面</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    @endif


    <form method="POST" action="{{route('account.update', ['id' => $account->id])}}">
        @csrf
        @method('PUT')
        <div class="flex entry">
            <div>
                <label>アカウント名: {{ $account->name }}</label>
                <input type="text" name="name" value="{{ $account->name }}" class="{{ $errors->has('name') ? 'is-invalid' : '' }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div>
                <label>メールアドレス: {{ $account->email }}</label>
                <div>
                    <input type="text" name="email" value="{{ $account->email }}" class="{{ $errors->has('email') ? 'is-invalid' : '' }}">
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div>
                <label>パスワード</label>
                <input type="password" name="password" placeholder="パスワードを入力" class="{{ $errors->has('password') ? 'is-invalid' : '' }}">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror
                <label>パスワード確認</label>
                <input type="password" name="password_confirmation" placeholder="パスワードを再入力">
            </div>
            <div>
                <label>電話番号: {{ $account->tel }}</label>
                <input type="text" name="tel" value="{{ $account->tel }}" class="{{ $errors->has('tel') ? 'is-invalid' : '' }}">
                @error('tel')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            @if(Auth::user()->role === 1) <!-- ログインユーザーが管理者の場合のみ権限の欄を表示 -->
                <div>
                    <label>権限:</label>
                    <div class="arrow-down">
                        <select name="role" class="{{ $errors->has('role') ? 'is-invalid' : '' }}">
                            <option value="2" {{ $account->role === 2 ? 'selected' : '' }}>一般</option>
                            <option value="1" {{ $account->role === 1 ? 'selected' : '' }}>管理者</option>
                        </select>
                    </div>
                    @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            @endif
        </div>
        <div class="flex btns">
            <a href={{route('account.index')}} class="btn">戻る</a>
            <div>
                <button class="btn">保存する</button>
            </div>
        </form>
        @if(Auth::user()->role === 1)
            <form method="POST" action="{{route('account.delete', ['id' => $account->id])}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn">削除する</button>
            </form>
        @endif
        </div>
    
</div>
@endsection