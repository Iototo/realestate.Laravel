@extends('layouts.realestate_login')

@section('content')
    <div class="login-container">
        <div class="login_form">
            <h1>パスワードリセット</h1>
            <x-jet-validation-errors class="mb-4" />

            <div class="mb-4 text-sm text-gray-600">
                {{ __('パスワードを忘れた場合は、メールアドレスを教えていただければ、新しいパスワードを選択できるパスワードリセットリンクをメールでお送りします。') }}
            </div>

            <div style="margin-top: 20px;">
                @if (session('status'))
                    <div class="mb-4 mt-2 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="block">
                        <x-jet-label for="email" value="{{ __('メールアドレス') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button style="text-align: center;">
                    {!! __('パスワードをリセットするための<br>リンクを送信します') !!}
                </x-jet-button>
            </div>


        </form>
@endsection
