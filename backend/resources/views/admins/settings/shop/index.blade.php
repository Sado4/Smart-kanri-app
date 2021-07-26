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
                        <div class="card-header card-h text-center">店舗編集</div>

                        <div class="card-body text-center">
                            <form method="POST" action="{{ route('shop.update', ['id' => $user->shop->id]) }}"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- 店舗名 --}}
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">店舗名</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('name'))
                                            <input id="name" class="form-control" type="text" name="name"
                                                value="{{ $user->shop->name }}">
                                        @else
                                            <input id="name" class="form-control is-invalid" type="text" name="name"
                                                value="{{ $user->shop->name }}">
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                    <div class="mt-5 mb-4">
                                        <button type="submit" class="btn btn-primary">
                                            変更を保存
                                        </button>
                                </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
