@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">作成済の店舗に所属します</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form>
                        <p>管理者より店舗名を教えてもらいましょう</p>
                        <input type="text" placeholder="店舗名を入力してください" size="30">
                    </form>

                    <div>
                        <a href="#">検索する</a><br>
                        <a href="http://127.0.0.1:8080/register/setup/">戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection