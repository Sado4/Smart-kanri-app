@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">あなたが所属する店舗を作成します</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p>店舗名を教えてください</p>
                    <a href="http://127.0.0.1:8080/admin">店舗作成</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection