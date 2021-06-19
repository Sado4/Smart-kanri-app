@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="#">+ 顧客情報新規作成</a></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p>検索する</p>
                    <a href="#">3  テスト様</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection