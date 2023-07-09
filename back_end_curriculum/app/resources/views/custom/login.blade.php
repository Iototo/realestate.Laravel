@extends('layouts.realestate_login')

@section('content')
    <div class="login-container">
        <div class="login_form">
            <h1>ログイン</h1>
            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <x-jet-label for="email" value="{{ __('メールアドレス') }}" />
                    <x-jet-input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="form-group">
                    <x-jet-label for="password" value="{{ __('パスワード') }}" />
                    <x-jet-input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="form-group">
                    <div class="checkbox-container">
                        <x-jet-checkbox id="remember_me" name="remember" class="mr-2"/>
                        <label for="remember_me" class="checkbox-label">
                            <span class="text-sm text-gray-600">{{ __('次回から自動的にログイン') }}</span>
                        </label>
                    </div>
                </div>

                <!-- <div class="form-group password-reset-link">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 centered-text" href="{{ route('password.request') }}">
                            {{ __('パスワードを忘れた場合はこちら') }}
                        </a>
                    @endif -->

                    <x-jet-button class="form-button">
                        {{ __('ログイン') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
@endsection
