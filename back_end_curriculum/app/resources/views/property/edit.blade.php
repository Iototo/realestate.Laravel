@extends('layouts.realestate')

@section('content')
    <div class="inner1000 content">
        <h1>物件編集画面</h1>

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

        <form method="POST" action="{{ route('property.update', $property->id) }}">
            @csrf
            @method('PUT')
            <div class="flex entry">
                <div>
                    <label>物件名: {{ $property->name }}</label>
                    <input type="text" name="name" value="{{ $property->name }}" class="{{ $errors->has('name') ? 'is-invalid' : '' }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label>広さ: {{ $property->breadth }} ㎡</label>
                    <input type="text" name="breadth" value="{{ $property->breadth }}" class="{{ $errors->has('breadth') ? 'is-invalid' : '' }}">
                    @error('breadth')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label>住所: {{ $property->address }}</label>
                    <input type="text" name="address" value="{{ $property->address }}" class="{{ $errors->has('address') ? 'is-invalid' : '' }}">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label>間取り: {{ $property->floor_plan }}</label>
                    <input type="text" name="floor_plan" value="{{ $property->floor_plan }}" class="{{ $errors->has('floor_plan') ? 'is-invalid' : '' }}">
                    @error('floor_plan')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label>入居状況: {{ $property->tenancy_status == 1 ? '満室' : ($property->tenancy_status == 2 ? '空室' : '空き予定') }}</label>
                    <select name="tenancy_status" class="{{ $errors->has('tenancy_status') ? 'is-invalid' : '' }}">
                        <option value="1" @if($property->tenancy_status == 1) selected @endif>満室</option>
                        <option value="2" @if($property->tenancy_status == 2) selected @endif>空室</option>
                        <option value="3" @if($property->tenancy_status == 3) selected @endif>空き予定</option>
                    </select>
                    @error('tenancy_status')
                        <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="flex btns">
                <a href={{route('property.index')}} class="btn">戻る</a>
                <div>
                    <button type="submit" class="btn">保存する</button>
                </div>
            </form>
            <form method="POST" action="{{ route('property.destroy', $property->id) }}">
                @csrf
                @method('DELETE')
                <div>
                    <button type="submit" class="btn">削除する</button>
                </div>
            </form>
        </div>
    </div>
@endsection
