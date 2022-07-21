@extends('layouts.app')

@section('content')


        <h1>会社一覧</h1>

        <table class='table table-striped table-hover'>
            @csrf
            <tr>
                <th>カテゴリ</th><th>会社名</th><th>住所</th>
            </tr>

            @foreach ($offices as $office)
                <tr>
                    <td>{{ $office->category->name }}</td>
                    <td>
                        <a href={{ route('office.detail', ['id' => $office->id ]) }}>
                            {{ $office->name }}
                        </a>
                    </td>
                    <td>{{ $office->address }}</td>
                </tr>
            @endforeach
        </table>

        <div>
            <a href={{ route('office.new') }} class='btn btn-outline-primary'>新規登録会社</a>



@endsection