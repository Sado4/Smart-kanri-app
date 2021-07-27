@extends('layouts.css_none_admin')

@section('description', '顧客情報を編集するページ')
@section('title', '顧客情報編集')
@section('pageCss')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/create.css') }}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
@endsection

@include('layouts.header_nav')

@include('layouts.side_nav')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-h text-center">顧客情報編集</div>

                        <div class="card-body text-center">
                            <form id="form-input" method="POST"
                                action="{{ route('customer.update', ['id' => $customer->id]) }}"
                                enctype="multipart/form-data">
                                @csrf

                                @if ($upError)
                                    <ul>
                                        <li>{{ $upError }}</li>
                                    </ul>
                                @endif

                                <div class="mb-4">
                                    <h4>～必須情報～</h4>
                                    <p class="small">*入力必須項目</p>
                                </div>

                                {{-- 顧客名 --}}
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">顧客名*</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('name'))
                                            <input id="name" class="form-control" type="text" name="name"
                                                value="{{ $customer->name }}" placeholder="例: 山田  太郎">
                                        @else
                                            <input id="name" class="form-control is-invalid" type="text" name="name"
                                                value="{{ $customer->name }}" placeholder="例: 山田  太郎">
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                {{-- よみがな --}}
                                <div class="form-group row">
                                    <label for="kana" class="col-md-4 col-form-label text-md-right">よみがな*</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('kana'))
                                            <input id="kana" class="form-control" type="text" name="kana"
                                                value="{{ $customer->kana }}" placeholder="例: やまだ たろう">
                                        @else
                                            <input id="kana" class="form-control is-invalid" type="text" name="kana"
                                                value="{{ $customer->kana }}" placeholder="例: やまだ たろう">
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('kana')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>


                                {{-- ID --}}
                                <div class="form-group row">
                                    <label for="management_id" class="col-md-4 col-form-label text-md-right">ID*</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('management_id'))
                                            <input id="management_id" min="1" class="form-control" type="number"
                                                name="management_id" value="{{ $customer->management_id }}"
                                                placeholder="例: 11">
                                        @else
                                            <input id="management_id" min="1" class="form-control is-invalid" type="number"
                                                name="management_id" value="{{ $customer->management_id }}"
                                                placeholder="例: 11">
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('management_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                {{-- 性別 --}}
                                <div class="mt-4 mb-3">
                                    <label class="control-label">{{ __('性別') }}</label>
                                </div>

                                <div class="form-group text-center form-check-inline mb-4">
                                    @if ($customer->sex == '男性')
                                        <div class="custom-control custom-radio ml-4 mr-4">
                                            <input class="custom-control-input" id="female" type="radio" name="sex"
                                                value="女性">
                                            <label class="custom-control-label" for="female">女性</label>
                                        </div>
                                        <div class="custom-control custom-radio ml-4 mr-4">
                                            <input class="ml-3 custom-control-input" id="male" type="radio" name="sex"
                                                value="男性" checked>
                                            <label class="custom-control-label" for="male">男性</label>
                                        </div>
                                    @else
                                        <div class="custom-control custom-radio ml-4 mr-4">
                                            <input class="custom-control-input" id="female" type="radio" name="sex"
                                                value="女性" checked>
                                            <label class="custom-control-label" for="female">女性</label>
                                        </div>
                                        <div class="custom-control custom-radio ml-4 mr-4">
                                            <input class="ml-3 custom-control-input" id="male" type="radio" name="sex"
                                                value="男性">
                                            <label class="custom-control-label" for="male">男性</label>
                                        </div>
                                    @endif
                                </div>

                                <div class="mt-4 mb-4">
                                    <h4>～詳細情報～</h4>
                                </div>


                                {{-- 生年月日 --}}
                                <div class="form-group row">
                                    <label for="birthday" class="col-md-4 col-form-label text-md-right">生年月日</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('birthday'))
                                            <input id="birthday" class="form-control" type="date" name="birthday"
                                                value="{{ $customer->birthday }}">
                                        @else
                                            <input id="birthday" class="form-control is-invalid" type="date" name="birthday"
                                                value="{{ $customer->birthday }}">
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('birthday')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                {{-- 職業 --}}
                                <div class="form-group row">
                                    <label for="job" class="col-md-4 col-form-label text-md-right">職業</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('job'))
                                            <input id="job" class="form-control" type="text" name="job"
                                                value="{{ $customer->job }}">
                                        @else
                                            <input id="job" class="form-control is-invalid" type="text" name="job"
                                                value="{{ $customer->job }}">
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('job')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                {{-- 電話番号 --}}
                                <div class="form-group row">
                                    <label for="tel" class="col-md-4 col-form-label text-md-right">電話番号</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('tel'))
                                            <input id="tel" class="form-control" type="text" name="tel"
                                                value="{{ $customer->tel }}">
                                        @else
                                            <input id="tel" class="form-control is-invalid" type="tel" name="tel"
                                                value="{{ $customer->tel }}">
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('tel')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                {{-- email --}}
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('email'))
                                            <input id="email" class="form-control" type="text" name="email"
                                                value="{{ $customer->email }}">
                                        @else
                                            <input id="email" class="form-control is-invalid" type="email" name="email"
                                                value="{{ $customer->email }}">
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>


                                {{-- 来店動機 --}}
                                <div class="form-group row">
                                    <label for="motive" class="col-md-4 col-form-label text-md-right">来店動機(何が魅力で来店？)</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('motive'))
                                            <input id="motive" class="form-control" type="text" name="motive"
                                                value="{{ $customer->motive }}">
                                        @else
                                            <input id="motive" class="form-control is-invalid" type="text" name="motive"
                                                value="{{ $customer->motive }}">
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('motive')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                {{-- どこで見つけたか --}}
                                <div class="form-group row">
                                    <label for="where" class="col-md-4 col-form-label text-md-right">当店をどこで見つけたか？</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('where'))
                                            <input id="where" class="form-control" type="text" name="where"
                                                value="{{ $customer->where }}">
                                        @else
                                            <input id="where" class="form-control is-invalid" type="text" name="where"
                                                value="{{ $customer->where }}">
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('where')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                {{-- メモ --}}
                                <div class="form-group row">
                                    <label for="memo" class="col-md-4 col-form-label text-md-right">メモ</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('memo'))
                                            <textarea id="memo" class="form-control" type="text" name="memo" rows="4"
                                                value="{{ $customer->memo }}">{{ $customer->memo }}</textarea>
                                        @else
                                            <textarea id="memo" class="form-control is-invalid" type="text" rows="4"
                                                name="memo"
                                                value="{{ $customer->memo }}">{{ $customer->memo }}</textarea>
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('memo')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                {{-- 要望など --}}
                                <div class="form-group row">
                                    <label for="demand" class="col-md-4 col-form-label text-md-right">要望など</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('demand'))
                                            <textarea rows="4" id="demand" class="form-control" type="text" name="demand"
                                                value="{{ $customer->demand }}">{{ $customer->demand }}</textarea>
                                        @else
                                            <textarea rows="4" id="demand" class="form-control is-invalid" type="text"
                                                name="demand"
                                                value="{{ $customer->demand }}">{{ $customer->demand }}</textarea>
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('demand')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                {{-- 写真 --}}
                                <div class="mt-5 form-group row">
                                    <label class="mb-3" for="image" class="">写真</label>

                                    @if (!$customer->image == null)
                                        <div>
                                            <img width="250" height="250" src="{{ $customer->full_image_url }}">
                                        </div>
                                    @endif

                                    <div class="mt-3">
                                        @if (count($errors) == 0 || !$errors->has('image'))
                                            <input class="form-control not" id="image" type="file" name="image"
                                                accept="image/jpeg, image/png">
                                        @else
                                            <input class="form-control is-invalid not" id="image" type="file" name="image"
                                                accept="image/jpeg, image/png">
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>
                            </form>

                            <form action="{{ route('file.delete', ['id' => $customer->id]) }}" method="POST">
                                @csrf
                                <div class="form-group row mb-5 mt-4">
                                    <div class="col-md-8 offset-md-4 mx-auto">
                                        <input type="submit" type="submit" class="btn btn-primary btn-sm btn-dell-file"
                                            value="ファイルを削除">
                                    </div>
                                </div>
                            </form>

                            <div class="btn-group mb-4 mt-4">
                                <form action="{{ route('customer.destroy', ['id' => $customer->id]) }}" method="POST">
                                    @csrf
                                    <div class="mr-5">
                                        <div class="">
                                            <button type="submit" class="btn btn-primary btn-sm btn-dell">
                                                <span>{{ __('顧客を削除') }}</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <form>
                                    <div class="ml-5">
                                        <div class="">
                                            <input form="form-input" type="submit" class="btn btn-primary" value="保存する">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            {{-- <div class="col-md-8 offset-md-4">
                                <a href="{{ route('customer.show', ['id' => $customer->id]) }}"><button type="submit"
                                        class="btn btn-primary ">
                                        {{ __('キャンセル') }}
                                    </button></a>
                            </div> --}}


                        </div>
                    </div>
                </div>
            </div>
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
    @endsection
