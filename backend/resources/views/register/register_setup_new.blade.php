<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Smart-管理') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link href="{{ asset('css/new.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Smart-管理') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <i class="bi bi-list"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('ユーザー登録') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header card-h text-center">あなたが所属する店舗を作成します</div>

                            <div class="card-body">

                                <form action="{{ route('shop.create') }}" method="POST">
                                    @csrf
                                    <div class="text-center">
                                        <div class="form-group">
                                            <p>①店舗名入力</p>
                                            <label for="shop_name" class="small">店舗名</label>
                                            @if (count($errors) == 0)
                                                <input id="shop_name" class="form-control" type="text" name="shop_name"
                                                    value="{{ old('shop_name') }}" placeholder="店舗名" size="25">
                                            @else
                                                <input id="shop_name" class="form-control is-invalid" type="text"
                                                    name="shop_name" value="{{ old('shop_name') }}" placeholder="店舗名"
                                                    size="25">
                                            @endif

                                            @if (count($errors) > 0)
                                                @error('shop_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            @endif
                                        </div>

                                        <div class="form-group mt-5">
                                            <p>②業種選択</p>
                                            <div>
                                                <label class="small my-1 mr-2" for="sector">業種</label>
                                                <select class="form-control custom-select my-1 mr-sm-2" id="sector">
                                                    @foreach ($sectors as $sector)
                                                        <option value="{{ $sector->id }}">
                                                            {{ $sector->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mt-5">
                                            <p>③確認</p>
                                            <div>
                                                <p>セットアップ完了です。</p>
                                                <p class="small">※自動で料金が発生することはありません。</p>
                                                <button class="btn btn-primary mt-3" type="submit"><span
                                                        class="space">店舗作成</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="text-center mb-3 mt-5">
                                    <a href="{{ route('setup.index') }}">戻る</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>
    </div>
</body>

</html>
