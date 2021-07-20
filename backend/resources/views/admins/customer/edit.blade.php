<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="顧客管理システムでスマートに顧客を管理できるWebアプリケーションの「Smart-管理」の管理画面" />
    <meta name="author" content="@derasado" />
    <title>管理画面 - Smart-管理</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/customer.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <div>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark mb-5">
            <!-- Navbar Brand-->
            <h2 class="navbar-brand ps-3">カルテ新規作成</h2>
        </nav>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-2">

                <div class="card-body">
                    <form method="POST" action="{{ url('/admin/customer/{id}') }}" enctype="multipart/form-data">
                        <div>
                            <h5>～必須情報～</h5>
                            <p class="small">*入力必須項目</p>
                        </div>
                        @csrf

                        @if (count($errors) > 0)
                            <ul>
                                @error('name')
                                    <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        @endif
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('お名前*') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ $customer->name }}">

                                {{-- @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                            </div>
                        </div>

                        @if (count($errors) > 0)
                            <ul>
                                @error('kana')
                                    <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        @endif
                        <div class="form-group row">
                            <label for="kana" class="col-md-4 col-form-label text-md-right">{{ __('よみがな*') }}</label>

                            <div class="col-md-6">
                                <input id="kana" type="text" class="form-control" name="kana"
                                    value="{{ old('kana') }}">
                            </div>
                        </div>
                        @if (count($errors) > 0)
                            <ul>
                                @error('management_id')
                                    <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        @endif
                        <div class="form-group row">
                            <label for="management_id" class="col-md-4 col-form-label text-md-right">{{ __('ID*') }}</label>

                            <div class="col-md-6">
                                <input id="management_id" type="number" min="1" class="form-control" name="management_id" value="{{ old('management_id') }}">
                            </div>
                        </div>

                        <div class="form-group row mb-">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('性別') }}</label>

                            <div class="col-md-6">
                                <input id="female" type="radio" name="sex" value="女性" checked>
                                <label for="female">女性</label>
                                <input class="ml-3" id="male" type="radio" name="sex" value="男性">
                                <label for="male">男性</label>
                            </div>
                        </div>

                        <div class="mt-4 mb-3">
                            <h5>～詳細情報～</h5>
                        </div>

                        @if (count($errors) > 0)
                            <ul>
                                @error('birthday')
                                    <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        @endif
                        <div class="form-group row">
                            <label for="birthday"
                                class="col-md-4 col-form-label text-md-right">{{ __('生年月日') }}</label>
                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control" name="birthday"
                                    value="{{ old('birthday') }}">
                            </div>
                        </div>
                        @if (count($errors) > 0)
                            <ul>
                                @error('job')
                                    <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        @endif
                        <div class="form-group row">
                            <label for="job" class="col-md-4 col-form-label text-md-right">{{ __('職業') }}</label>

                            <div class="col-md-6">
                                <input id="job" type="text" class="form-control" name="job"
                                    value="{{ old('job') }}">
                            </div>
                        </div>
                        @if (count($errors) > 0)
                            <ul>
                                @error('tel')
                                    <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        @endif
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('電話番号') }}</label>

                            <div class="col-md-6">
                                <input placeholder="※ハイフン無し" id="tel" type="tel" class="form-control" name="tel" value="{{ old('tel') }}">
                            </div>
                        </div>
                                @if (count($errors) > 0)
                                    <ul>
                                        @error('email')
                                            <li>{{ $message }}</li>
                                        @enderror
                                    </ul>
                                @endif
                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ old('email') }}">
                            </div>
                        </div>
                                @if (count($errors) > 0)
                                    <ul>
                                        @error('motive')
                                            <li>{{ $message }}</li>
                                        @enderror
                                    </ul>
                                @endif
                        <div class="form-group row">
                            <label for="motive"
                                class="col-md-4 col-form-label text-md-right">{{ __('来店動機(何が魅力で来店？)') }}</label>

                            <div class="col-md-6">
                                <input id="motive" type="text" class="form-control" name="motive"
                                    value="{{ old('motive') }}">
                            </div>
                        </div>
                                @if (count($errors) > 0)
                                    <ul>
                                        @error('where')
                                            <li>{{ $message }}</li>
                                        @enderror
                                    </ul>
                                @endif
                        <div class="form-group row">
                            <label for="where"
                                class="col-md-4 col-form-label text-md-right">{{ __('当店をどこで見つけたか？') }}</label>

                            <div class="col-md-6">
                                <input id="where" type="text" class="form-control" name="where"
                                    value="{{ old('where') }}">
                            </div>
                        </div>
                                @if (count($errors) > 0)
                                    <ul>
                                        @error('memo')
                                            <li>{{ $message }}</li>
                                        @enderror
                                    </ul>
                                @endif
                        <div class="form-group row">
                            <label for="memo" class="col-md-4 col-form-label text-md-right">{{ __('メモ') }}</label>

                            <div class="col-md-6">
                                <textarea id="memo" type="text" class="form-control" value="{{ old('memo') }}" name="memo">{{ old('memo') }}</textarea>
                            </div>
                        </div>
                                @if (count($errors) > 0)
                                    <ul>
                                        @error('demand')
                                            <li>{{ $message }}</li>
                                        @enderror
                                    </ul>
                                @endif
                        <div class="form-group row">
                            <label for="demand"
                                class="col-md-4 col-form-label text-md-right">{{ __('要望など') }}</label>

                            <div class="col-md-6">
                                <textarea id="demand" value="{{ old('demand') }}" type="text" class="form-control" name="demand">{{ old('demand') }}</textarea>
                            </div>
                        </div>

                        <div class="mt-5 mb-3">
                            <h5>写真</h5>
                        </div>
                                @if (count($errors) > 0)
                                    <ul>
                                        @error('image')
                                            <li>{{ $message }}</li>
                                        @enderror
                                    </ul>
                                @endif
                        <div>
                            <div>
                                <input type="file" name="image" accept="image/jpeg, image/png">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('作成') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-8 offset-md-4">
                        <a href="/admin"><button type="submit" class="btn btn-primary">
                                {{ __('キャンセル') }}
                            </button></a>
                    </div>
