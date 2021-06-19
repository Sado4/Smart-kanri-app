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
                    <p>店舗名を入力してください</p>
                    <a href="#">検索する</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection