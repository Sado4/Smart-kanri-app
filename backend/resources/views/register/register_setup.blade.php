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

                    <div>
                        <p>店舗のセットアップを行って利用を開始してください。</p>
                    </div>

                    <div>
                        <a href="/register/setup/new">店舗のセットアップへ</a>
                    </div>
                    <br>

                    <div>
                        <p>既に他のスタッフが店舗を作成していますか？</p>
                        <a href="/register/setup/join">作成済の店舗に所属する</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection