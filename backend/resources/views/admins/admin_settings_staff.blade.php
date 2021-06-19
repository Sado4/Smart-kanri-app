@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="#">スタッフ一覧</a>
                <br>
                <a href="#">所属申請</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p>検索する</p>
                    <a href="#">スタッフ名</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection