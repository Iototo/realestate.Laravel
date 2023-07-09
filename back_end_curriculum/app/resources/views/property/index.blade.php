@extends('layouts.realestate')

@section('content')
<div class="inner1000 content">
    <form action="{{route('property.search')}}" method="get">
        <input class="form-search" type="text" name="name" placeholder="物件名">
        <input class="form-search" type="text" name="address" placeholder="住所">
        <div align="right">
            <button class="form-search btn">検索する</button>
        </div>
    </form>
    <div class="flex">
        <h1>物件一覧画面</h1>

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

        <div>
            @auth
            <a href={{route('property.regist')}}><button class="btn">登録する</button></a>
            @endauth
            <a href={{route('property.exportCsv')}}><button class="btn">CSV出力</button></a>
        </div>
    </div>
    <table class="pView">
        <tbody>
            <tr>
                <td>物件名</td>
                <td>住所</td>
                <td>広さ（㎡）</td>
                <td>間取り</td>
                <td>入居状況</td>
                <td>物件登録者</td>
                <td></td>
            </tr>
            @foreach ($properties as $property)
            <tr>
                <td><a href={{route('property.spec', ['id' => $property->id])}}>{{$property->name}}</a></td>
                <td>{{$property->address}}</td>
                <td>{{$property->breadth}}㎡</td>
                <td>{{$property->floor_plan}}</td>
                <td>
                    @if ($property->tenancy_status == 1)
                    満室
                    @elseif ($property->tenancy_status == 2)
                    空室
                    @else
                    空室予定
                    @endif
                </td>
                <td>{{$property->account_name}}</td>
                <td>
                    @auth
                    <a href={{route('property.edit', ['id' => $property->id])}}><button class="btn">編集</button></a>
                    @endauth
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="display: flex; justify-content: center;">
    {{ $properties->links() }}<!-- ページネーションリンクを表示 -->
    </div>
</div>
@endsection
