@extends('layouts.admin')

@section('description', 'プロフィール詳細ページ')
@section('title', 'プロフィール詳細')
@section('pageCss')

@endsection

@include('layouts.header_nav')

@include('layouts.side_nav')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-h text-center">プロフィール編集</div>

                        <div class="card-body text-center">
                            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- ユーザ名 --}}
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">ユーザー名</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('name'))
                                            <input id="name" class="form-control" type="text" name="name"
                                                value="{{ $user->name }}">
                                        @else
                                            <input id="name" class="form-control is-invalid" type="text" name="name"
                                                value="{{ $user->name }}">
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-primary">
                                            <span>変更を保存</span>
                                        </button>
                                    </div>
                                </div>
                        </div>
                        </form>

                        <div class="card text-center">
                            <div style="max-width: 90%;" class="mx-auto mt-4">
                                <p>メールアドレス</p>
                                <p class="border-bottom">{{ $user->email }}</p>
                            </div>
                            <div class="mt-4 mb-5">
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
    </main>
@endsection
