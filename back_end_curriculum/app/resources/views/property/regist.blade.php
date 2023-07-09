@extends('layouts.realestate')

@section('content')
    <div class="inner1000 content">
        <h1>物件登録画面</h1>
        <form method="POST" action="{{ route('property.store') }}">
            @csrf
            <div class="flex entry">
                <div>
                    <label>物件名</label>
                    <input type="text" name="name" placeholder="例）テスト名">
                </div>
                <div>
                    <label>広さ</label>
                    <div class="prop-unit">
                        <input type="text" name="breadth" placeholder="例）10">
                    </div>
                </div>
                <div>
                    <label>住所</label>
                    <input type="text" name="address" placeholder="例）テスト住所">
                </div>
                <div>
                    <label>間取り</label>
                    <input type="text" name="floor_plan" placeholder="例）3LDK">
                </div>
                <div>
                    <label>入居状況</label><!-- 1：満室、2：空室、3：空き予定 -->
                    <div class="arrow-down">
                        <select name="tenancy_status">
                            <option value="">選択してください</option>
                            <option value="2">空室</option>
                            <option value="3">空き予定</option>
                            <option value="1">満室</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex btns">
                <a href={{route('property.index')}} class="btn">戻る</a>
                <button type="submit" class="btn">登録する</button>
            </div>
        </form>
    </div>
@endsection
