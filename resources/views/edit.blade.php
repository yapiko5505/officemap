@extends('layouts.app')

@section('content')
        <h1>{{ $office->name }}を編集する</h1>
        {{ Form::model($office, ['route' => ['office.update', $office->id]]) }}
            <div class='form-group'>
                {{ Form::label('name', '会社名:') }}
                {{ Form::text('name', null ) }}
            </div>
            <div class='form-group'>
                {{ Form::label('address', '住所:') }}
                {{ Form::text('address', null ) }}
            </div>
            <div class='form-group'>
                {{ Form::label('category_id', 'カテゴリ:') }}
                {{ Form::select('category_id', $categories) }}
            </div>
            <div class='form-group'>
                {{ Form::submit('更新する', ['class' => 'btn-btn-outline-primary'])}}
            </div>
        {{ Form::close() }}
        <div>
            <a href={{ route('office.list') }}>一覧に戻る</a>
        </div>
@endsection