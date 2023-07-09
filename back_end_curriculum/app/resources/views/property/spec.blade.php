@extends('layouts.realestate')

@section('content')
    <div class="inner1000 content">
        <h1>物件詳細画面</h1>
        <form>
            <div class="flex entry spec">
                <div>
                    <label>物件名</label>
                    <p>{{ $property->name }}</p>
                </div>
                <div>
                    <label>広さ</label>
                    <p class="prop-unit">{{ $property->breadth }}</p>
                </div>
                <div>
                    <label>住所</label>
                    <p>{{ $property->address }}</p>
                </div>
                <div>
                    <label>間取り</label>
                    <p>{{ $property->floor_plan }}</p>
                </div>
                <div>
                    <label>入居状況</label>
                    <p>{{ $property->tenancy_status == 1 ? '満室' : ($property->tenancy_status == 2 ? '空室' : '空室予定') }}</p>
                </div>
            </div>
            <div class="flex btns">
                <a href="{{ route('property.index') }}" class="btn">戻る</a>
            </div>
        </form>
    </div>
@endsection
