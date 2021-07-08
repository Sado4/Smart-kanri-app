@extends('layouts.app')

<link href="{{ asset('css/join.css') }}" rel="stylesheet" />


@section('content')
    <script src="{{ asset('js/join.js') }}"></script>
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


                        @if ($shop === null)
                            <form action="{{ url('/register/setup/join') }}" method="POST">
                                @csrf
                                <p>管理者より店舗名を教えてもらいましょう</p>
                                @if (count($errors) > 0)
                                    <ul>
                                        @error('shop_name')
                                            <li>{{ $message }}</li>
                                        @enderror
                                @endif
                                </ul>
                                <input type="text" name="shop_name" value="{{ old('shop_name') }}"
                                    placeholder="所属する店舗名を入力" size="30">

                                <div>
                                    <input type="submit" value="検索する">
                                    <a href="/register/setup/">戻る</a>
                                </div>
                            </form>
                    </div>
                </div>
            @else
                <form action="{{ route('staff.join') }}" method="POST">
                    @csrf
                    <div>
                        <h3>{{ $shop->name }}</h3>
                        <p>上記の店舗が見つかりました。</p>
                    </div>
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                    <input type="submit" value="この店舗に所属する">
                </form>
                <a href="/register/setup/join">キャンセル</a>

                @endif
            </div>
        </div>
    </div>
@endsection
