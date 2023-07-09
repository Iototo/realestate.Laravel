@extends('layouts.realestate')

@section('content')
    <div class="inner1000 content">
        <h1>アカウント登録画面</h1>

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

        <form action="{{ route('account.store') }}" method="POST">
            @csrf
            <div class="flex entry">
                <div>
                    <label for="name">アカウント名</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="例）テスト名">
                    @error('name')
                        <span class="error" style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="email">メールアドレス</label>
                    <div>
                        <input id="email" type="email" name="email" :value="old('email')" required placeholder="例）test@gmail.com">
                        @error('email')
                            <span class="error" style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="password">パスワード</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="例）himitsu007">
                    @error('password')
                        <span class="error" style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation">パスワード確認</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="例）himitsu007">
                </div>
                <div>
                    <label for="tel">電話番号</label>
                    <input id="tel" type="text" name="tel" :value="old('tel')" placeholder="例）07012345678">
                    @error('tel')
                        <span class="error" style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="role">権限</label>
                    <div class="arrow-down">
                        <select id="role" name="role" required>
                            <option value="">選択してください</option>
                            <option value="2">一般</option>
                            <option value="1">管理者</option>
                        </select>
                        @error('role')
                            <span class="error" style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex btns">
                <a href={{route('account.index')}} class="btn">戻る</a>
                <button class="btn">登録する</button>
            </div>
        </form>
    </div>
@endsection

