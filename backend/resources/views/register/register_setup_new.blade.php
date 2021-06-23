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
                    <div>
                        <span>①サロン名入力</span>
                        <form action="{{ url('/admin') }}" method="post">
                            @csrf
                            <p>店舗名を教えてください</p>
                            <input type="text" placeholder="店舗名">
                    </div>

                    <div>
                        <span>②業種選択</span>
                        <p>業種を選んでください</p>
                        <div>
                            <input type="radio" id="sector" value="{{ $value['name'] }}" checked>
                            <label for="sector">{{ $value['name'] }}</label>
                        </div>
                    </div>

                    <div>
                        <span>③確認</span>
                        <div>
                            <h6>セットアップ完了です。</h6>
                            <p>※自動で料金が発生することはありません。</p>
                            <input type="submit" value="店舗作成">
                            <a href="http://127.0.0.1:8080/admin">店舗作成</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection