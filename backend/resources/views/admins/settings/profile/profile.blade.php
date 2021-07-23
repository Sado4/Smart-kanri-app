@extends('layouts.admin')

@section('description', 'プロフィール詳細ページ')
@section('title', 'プロフィール詳細')
@section('pageCss')

@endsection

@include('layouts.header_nav')

@include('layouts.side_nav')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div>
                        <form method="POST" action="{{ route('profile.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div>
                                <p class="small">*入力必須</p>
                            </div>

                            @if (count($errors) > 0)
                                <ul>
                                    @error('name')
                                        <li>{{ $message }}</li>
                                    @enderror
                                </ul>
                            @endif
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ユーザー名*') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ $user->name }}">
                                </div>

                                <div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">
                                                変更を保存
                                            </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                            <div class="card">
                                <div>
                                    <h5>メールアドレス</h5>
                                    <p>{{ $user->email }}</p>
                                </div>

                                <div>
                                    <div>
                                        <a href="{{ route('email.edit') }}"><button type="submit" class="btn btn-primary">
                                                編集する
                                            </button></a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endsection
