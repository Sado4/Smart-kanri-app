@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザ登録が完了しました</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a href="http://127.0.0.1:8080/register/setup/new">店舗のセットアップへ</a>
                    <br><br>
                    <a href="http://127.0.0.1:8080/register/setup/join">作成済の店舗に所属する</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection