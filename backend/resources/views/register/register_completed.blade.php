@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><span class="card-h">メールアドレスは確認済みです</span></div>

                <div class="card-body text-center mb-3">
                    <p>新しいアカウントでログインできるようになりました。</p>
                    <div class="col-md-6 mail-m text-center mt-4">
                        <a href="{{ route('setup.index') }}"><button type="submit" class="btn btn-primary">
                                {{ __('セットアップを始める') }}
                            </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
