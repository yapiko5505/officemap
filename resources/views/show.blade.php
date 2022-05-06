@extends('layouts.app')

@section('content')
        <h1>{{ $office->name }}</h1>
        <div>
            <p>{{ $office->category->name }}</p>
            <p>{{ $office->address }}</p>
        </div>

        <iframe id='map'
            src='https://www.google.com/maps/embed/v1/place?key=AIzaSyBuZq-IS4IM63WXmS6B6So4F7FAAZzsMj0&q={{ $office->address }}'
            width='100%'
            height='320'
            frameborder='0'>
        </iframe>
        <div>
            <a href={{ route('office.list') }}>一覧に戻る</a>
             | <a href={{ route('office.edit', ['id' => $office->id]) }}>編集</a>
        </div>
        <p></p>
        {{ Form::open(['method' => 'delete', 'route' => ['office.destroy', $office->id ]])}}
            {{ Form::submit('削除', ['class' => 'btn btn-outline-danger']) }}
        {{ Form::close() }}
@endsection