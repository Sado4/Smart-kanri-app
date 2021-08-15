@extends('layouts.css_none_admin')

@section('description', 'お客様自身に情報を入力してもらうページ')
@section('title', 'お客様情報入力')
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
                        <div class="card-header card-h text-center">お客様情報入力</div>

                        <div class="card-body text-center">
                            <form method="POST" action="{{ route('input.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-4">
                                    <h4>～必須情報～</h4>
                                    <p class="small">*入力必須項目</p>
                                </div>

                                {{-- 顧客名 --}}
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">お名前*</label>
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

                                {{-- 性別 --}}
                                <div class="mt-4 mb-3">
                                    <label class="control-label">{{ __('性別') }}</label>
                                </div>
                                <div class="form-group text-center form-check-inline mb-4">
                                    <div class="custom-control custom-radio ml-4 mr-4">
                                        <input class="custom-control-input" id="female" type="radio" name="sex" value="女性"
                                            checked>
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
                                            <input id="birthday" class="form-control is-invalid" type="date" name="birthday"
                                                value="{{ old('birthday') }}">
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
                                                value="{{ old('job') }}" placeholder="例: 美容師">
                                        @else
                                            <input id="job" class="form-control is-invalid" type="text" name="job"
                                                value="{{ old('job') }}" placeholder="例: 美容師">
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
                                                value="{{ old('tel') }}" placeholder="※ハイフン無し">
                                        @else
                                            <input id="tel" class="form-control is-invalid" type="tel" name="tel"
                                                value="{{ old('tel') }}" placeholder="※ハイフン無し">
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
                                                value="{{ old('email') }}" placeholder="例: hanako@example.com">
                                        @else
                                            <input id="email" class="form-control is-invalid" type="email" name="email"
                                                value="{{ old('email') }}" placeholder="例: hanako@example.com">
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
                                    <label for="motive" class="col-md-4 col-form-label text-md-right">来店動機(何が魅力で来店しましたか？)</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('motive'))
                                            <input placeholder="例: 写真の雰囲気がよかったなど" id="motive" class="form-control" type="text" name="motive"
                                                value="{{ old('motive') }}">
                                        @else
                                            <input placeholder="例: 写真の雰囲気がよかったなど" id="motive" class="form-control is-invalid" type="text" name="motive"
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
                                    <label for="where" class="col-md-4 col-form-label text-md-right">当店をどこで見つけましたか？</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('where'))
                                            <input placeholder="例: Google検索など" id="where" class="form-control" type="text" name="where"
                                                value="{{ old('where') }}">
                                        @else
                                            <input placeholder="例: Google検索など" id="where" class="form-control is-invalid" type="text" name="where"
                                                value="{{ old('where') }}">
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('where')
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
                                            <textarea rows="4" placeholder="ご自由にご記入ください" id="demand" class="form-control" type="text" name="demand"
                                                value="{{ old('demand') }}">{{ old('demand') }}</textarea>
                                        @else
                                            <textarea rows="4" placeholder="ご自由にご記入ください" id="demand" class="form-control is-invalid" type="text" name="demand"
                                                value="{{ old('demand') }}">{{ old('demand') }}</textarea>
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('demand')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                <div class="mt-5"><p>※入力した情報を確認して問題なければ、完了ボタンを押してください。</p></div>

                                <div class="text-center mt-5 mb-4">
                                    <button style="width: 150px;" type="submit" class="btn btn-primary">
                                        <span>{{ __('完了') }}</span>
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
