@extends('layouts.body')

@section('title', 'Top Page')

@include('layouts.header')

@section('content')
<h1>{{ $top }}</h1>
<a href="http://127.0.0.1:8080/signup">無料ユーザー登録</a>
@endsection