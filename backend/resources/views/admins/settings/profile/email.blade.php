@extends('layouts.admin')

@section('description', 'メールアドレスの設定ページ')
@section('title', 'メールアドレス設定')
@section('pageCss')

@endsection

@include('layouts.header_nav')

@include('layouts.side_nav')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- フラッシュメッセージ -->
                    @if (session('flash_message'))
                        <div class="flash_message alert-success text-center py-3 my-2">
                            {{ session('flash_message') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header card-h text-center">メールアドレス変更</div>

                        {{-- <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                    </div> --}}

                        <div class="card-body text-center">
                            <p>新しく使用するメールアドレスを入力してください</p>
                            {{-- @if (count($errors) > 0)
                                <ul>
                                    @error('new_email')
                                        <li>{{ $message }}</li>
                                    @enderror
                            </ul>
                            @endif --}}

                            <form action="{{ route('email.change') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6 mx-auto">

                                        @if (count($errors) == 0 || !$errors->has('new_email'))
                                            <input id="new_email" class="form-control" type="email" name="new_email"
                                                value="{{ old('new_email') }}">
                                        @else
                                            <input id="new_email" class="form-control is-invalid" type="email"
                                                name="new_email" value="{{ old('new_email') }}">
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('new_email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>
<div class="mt-4 mb-4">
    <input type="submit" class="btn btn-primary">
</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
