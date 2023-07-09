@extends('layouts.realestate')

@section('content')
        <div class="inner1000 content">
            <h1>アカウント詳細画面</h1>
            <form>
                <div class="flex entry spec">
                    <div>
                        <label>アカウント名</label>
                        <p>{{ $account->name }}</p>
                    </div>
                    <div>
                        <label>メールアドレス</label>
                        <p>{{ $account->email }}</p>
                    </div>
                    <div>
                        <label>電話番号</label>
                        <p>{{ $account->tel }}</p>
                    </div>
                    <div>
                        <label>権限</label>
                        <p>{{ $account->role == 1 ? '管理者' : '一般' }}</p>
                    </div>
                </div>
                <div class="flex btns">
                    <a href={{route('account.index')}} class="btn">戻る</a>
                    <a href={{route('account.edit', $account->id)}} class="btn">編集</a>
                </div>
            </form>
        </div>
@endsection
