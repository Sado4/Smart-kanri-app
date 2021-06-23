@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">メールアドレスは確認済みです</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p>新しいアカウントでログインできるようになりました。</p>
                    <div class="col-md-6 offset-md-4">
                        <a href="http://127.0.0.1:8080/register/setup"><button type="submit" class="btn btn-primary">
                                {{ __('セットアップを始める') }}
                            </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection