@extends('layouts.admin')

@section('description', 'メールアドレスの設定ページ')
@section('title', 'メールアドレス設定')
@section('pageCss')

@endsection

@include('layouts.header_nav')

@include('layouts.side_nav')

@section('content')
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
                    <div class="card-header">メールアドレス変更</div>

                    {{-- <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                </div> --}}

                    <div class="card-body">
                        <p>新しく使用するメールアドレスを入力してください</p>
                        @if (count($errors) > 0)
                            <ul>
                                @error('new_email')
                                    <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        @endif
                        <form action="{{ route('email.change') }}" method="POST">
                            @csrf
                            <input type="email" name="new_email">
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
