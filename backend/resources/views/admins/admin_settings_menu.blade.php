@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">メニュー一覧</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p>メニュー名</p>
                    <a href="#">メニューの追加</a>
                    <br>
                    <a href="#">ソフトジェル10本</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection