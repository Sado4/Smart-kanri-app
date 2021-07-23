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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <div>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark mb-5">
            <!-- Navbar Brand-->
            <h2 class="navbar-brand ps-3">カルテ編集</h2>
        </nav>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-2">

                <div class="card-body">
                    <form id="form-input" method="POST"
                        action="{{ route('customer.update', ['id' => $customer->id]) }}"
                        enctype="multipart/form-data">
                        @if ($upError)
                            <ul>
                                <li>{{ $upError }}</li>
                            </ul>
                        @endif
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
                                    value="{{ $customer->kana }}">
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
                            <label for="management_id"
                                class="col-md-4 col-form-label text-md-right">{{ __('ID*') }}</label>

                            <div class="col-md-6">
                                <input id="management_id" type="number" min="1" class="form-control"
                                    name="management_id" value="{{ $customer->management_id }}">
                            </div>
                        </div>

                        <div class="form-group row mb-">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('性別') }}</label>

                            <div class="col-md-6">
                                @if ($customer->sex == '男性')
                                    <input id="female" type="radio" name="sex" value="女性">
                                    <label for="female">女性</label>
                                    <input class="ml-3" id="male" type="radio" name="sex" value="男性" checked>
                                    <label for="male">男性</label>
                                @else
                                    <input id="female" type="radio" name="sex" value="女性" checked>
                                    <label for="female">女性</label>
                                    <input class="ml-3" id="male" type="radio" name="sex" value="男性">
                                    <label for="male">男性</label>
                                @endif
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
                                    value="{{ $customer->birthday }}">
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
                                    value="{{ $customer->job }}">
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
                                <input placeholder="※ハイフン無し" id="tel" type="tel" class="form-control" name="tel"
                                    value="{{ $customer->tel }}">
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
                                    value="{{ $customer->email }}">
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
                                    value="{{ $customer->motive }}">
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
                                    value="{{ $customer->where }}">
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
                                <textarea id="memo" type="text" class="form-control" value="{{ $customer->memo }}"
                                    name="memo">{{ $customer->memo }}</textarea>
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
                                <textarea id="demand" value="{{ $customer->demand }}" type="text"
                                    class="form-control" name="demand">{{ $customer->demand }}</textarea>
                            </div>
                        </div>

                        <div class="mt-5 mb-3">
                            <h5>写真</h5>
                        </div>

                        @if (!$customer->image == null)
                            <div>
                                <img width="250" height="250" src="{{ $customer->full_image_url }}">
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            <ul>
                                @error('image')
                                    <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        @endif
                        <div>
                            <input type="file" name="image" accept="image/jpeg, image/png">
                        </div>
                    </form>

                    <form action="{{ route('file.delete', ['id' => $customer->id]) }}" method="POST">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" type="submit" class="btn btn-primary btn-sm btn-dell-file"
                                    value="ファイルを削除">
                            </div>
                        </div>
                    </form>

                    <form>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input form="form-input" type="submit" class="btn btn-primary" value="保存する">
                            </div>
                        </div>
                    </form>

                    <form action="{{ route('customer.destroy', ['id' => $customer->id]) }}" method="POST">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-sm btn-dell">
                                    {{ __('削除する') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="col-md-8 offset-md-4">
                        <a href="{{ route('customer.show', ['id' => $customer->id]) }}"><button type="submit"
                                class="btn btn-primary ">
                                {{ __('キャンセル') }}
                            </button></a>
                    </div>

                    <script>
                        $(function() {
                            $(".btn-dell").click(function() {
                                if (confirm("顧客データを本当に削除しますか？")) {
                                    //そのままsubmit（削除）
                                } else {
                                    //cancel
                                    return false;
                                }
                            });
                        });

                        $(function() {
                            $(".btn-dell-file").click(function() {
                                if (confirm("ファイルを削除しますか？")) {
                                    //そのままsubmit（削除）
                                } else {
                                    //cancel
                                    return false;
                                }
                            });
                        });
                    </script>
