@extends('layouts.css_none_admin')

@section('description', '顧客情報を新規作成するページ')
@section('title', '顧客新規作成')
@section('pageCss')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/create.css') }}" rel="stylesheet" />
@endsection

@include('layouts.header_nav')

@include('layouts.side_nav')

@section('content')
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header card-h text-center">顧客情報新規登録</div>

                            <div class="card-body text-center">
                                <form method="POST" action="{{ route('customer.store') }}" enctype="multipart/form-data">
                                    @csrf

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
                                                    value="{{ old('name') }}" placeholder="例: 山田  太郎">
                                            @else
                                                <input id="name" class="form-control is-invalid" type="text" name="name"
                                                    value="{{ old('name') }}" placeholder="例: 山田  太郎">
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
                                                    value="{{ old('kana') }}" placeholder="例: やまだ たろう">
                                            @else
                                                <input id="kana" class="form-control is-invalid" type="text" name="kana"
                                                    value="{{ old('kana') }}" placeholder="例: やまだ たろう">
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
                                                    name="management_id" value="{{ old('management_id') }}"
                                                    placeholder="例: 11">
                                            @else
                                                <input id="management_id" min="1" class="form-control is-invalid" type="number"
                                                    name="management_id" value="{{ old('management_id') }}"
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
                                                    value="{{ old('birthday') }}">
                                            @else
                                                <input id="birthday" class="form-control is-invalid" type="date"
                                                    name="birthday" value="{{ old('birthday') }}">
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
                                                    value="{{ old('job') }}">
                                            @else
                                                <input id="job" class="form-control is-invalid" type="text" name="job"
                                                    value="{{ old('job') }}">
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
                                                    value="{{ old('tel') }}">
                                            @else
                                                <input id="tel" class="form-control is-invalid" type="tel" name="tel"
                                                    value="{{ old('tel') }}">
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
                                                    value="{{ old('email') }}">
                                            @else
                                                <input id="email" class="form-control is-invalid" type="email" name="email"
                                                    value="{{ old('email') }}">
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
                                                    value="{{ old('motive') }}">
                                            @else
                                                <input id="motive" class="form-control is-invalid" type="text" name="motive"
                                                    value="{{ old('motive') }}">
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
                                                    value="{{ old('where') }}">
                                            @else
                                                <input id="where" class="form-control is-invalid" type="text" name="where"
                                                    value="{{ old('where') }}">
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
                                                <textarea id="memo" class="form-control" type="text" name="memo"
                                                    value="{{ old('memo') }}">{{ old('memo') }}</textarea>
                                            @else
                                                <textarea id="memo" class="form-control is-invalid" type="text" name="memo"
                                                    value="{{ old('memo') }}">{{ old('memo') }}</textarea>
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
                                                <textarea id="demand" class="form-control" type="text" name="demand"
                                                    value="{{ old('demand') }}">{{ old('demand') }}</textarea>
                                            @else
                                                <textarea id="demand" class="form-control is-invalid" type="text" name="demand"
                                                    value="{{ old('demand') }}">{{ old('demand') }}</textarea>
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
                                            <div class="">
                                                @if (count($errors) == 0 || !$errors->has('image'))
                                                <input class="form-control not" id="image" type="file" name="image" accept="image/jpeg, image/png">
                                                @else
                                                <input  class="form-control is-invalid not" id="image" type="file" name="image" accept="image/jpeg, image/png">
                                                @endif

                                                @if (count($errors) > 0)
                                                    @error('image')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                @endif
                                            </div>
                                        </div>


                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">
                                            <span>{{ __('作成する') }}</span>
                                        </button>
                                    </div>
                                </form>

                                <div class="text-center mt-5 mb-3">
                                    <a href="/admin"><button type="submit" class="btn btn-primary">
                                            <span>{{ __('戻る') }}</span>
                                        </button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
