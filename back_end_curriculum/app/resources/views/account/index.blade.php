@extends('layouts.realestate')

@section('content')
<div class="inner1000 content">
    <div class="flex">
        <h1>アカウント一覧画面</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        @endif

        <div>
            <a href={{route('account.customRegist')}}><button class="btn">登録する</button></a>
            <a href={{route('account.exportCsv')}}><button class="btn">CSV出力</button></a>
        </div>
    </div>
    <table class="aView">
        <tbody>
            <tr>
                <td><p>アカウント名</p></td>
                <td><p>メールアドレス</p></td>
                <td><p>電話番号</p></td>
                <td><p>権限</p></td>
                <td></td>
            </tr>
            @foreach ($accounts as $account)
                <tr>
                    <td>
                        <!-- アカウント名をクリックすると詳細画面に移動 -->
                        <a href="{{route('account.spec', ['id' => $account->id])}}">
                            <p>{{$account->name}}</p>
                        </a>
                    </td>
                    <td><p>{{$account->email}}</p></td>
                    <td><p>{{$account->tel}}</p></td>
                    <td><p>{{$account->role == 1 ? '管理者' : '一般'}}</p></td>
                    <td>
                        <a href={{route('account.edit', ['id' => $account->id])}}><button class="btn">編集</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="display: flex; justify-content: center;">
    {{ $accounts->links() }} <!-- ページネーションリンクを表示 -->
    </div>
</div>
@endsection
