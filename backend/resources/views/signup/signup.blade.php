@extends('layouts.body')

@section('title', 'SignUp Page')

@include('layouts.header')

@section('content')
<h1>{{ $signup }}</h1>
<!-- 無料ユーザ登録はPOSTなのか？確認 -->
<a href="http://127.0.0.1:8080/email_verification">無料ユーザー登録はコチラ</a>
<br><br>
<a href="http://127.0.0.1:8080/login">ログインページはコチラ</a>
@endsection