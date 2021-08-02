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
                        <div class="card-header card-h text-center">来店情報編集</div>

                        <div class="card-body text-center">
                            <form id="form-input" method="POST" action="{{ route('visit.update', ['id' => $visit->id]) }}"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- 名前などの先頭の情報 --}}
                                <div class="container mb-3">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div style="max-width: 90%;" class="mx-auto">
                                                <p class="mt-3">{{ $visit->customer->kana }}</p>
                                                <div class="mb-3">
                                                    <h3 class="border-bottom">{{ $visit->customer->name }} 様</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 mt-5">
                                    <h2>-来店記録-</h2>
                                </div>

                                {{-- 生年月日 --}}
                                <div class="form-group row">
                                    <label for="date" class="col-md-4 col-form-label text-md-right">生年月日</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('date'))
                                            <input id="date" class="form-control" type="date" name="date"
                                                value="{{ $visit->date }}">
                                        @else
                                            <input id="date" class="form-control is-invalid" type="date" name="date"
                                                value="{{ $visit->date }}">
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                {{-- 担当者 --}}
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="user_id">担当者</label>
                                    <div class="col-md-6">
                                        <select name="id" class="form-control custom-select my-1 mr-sm-2" id="user_id">
                                            @foreach ($users as $staff)
                                                @if ($staff->name === $visit->user->name)
                                                    <option selected value="{{ $staff->id }}">
                                                        {{ $staff->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $staff->id }}">
                                                        {{ $staff->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                {{-- メモ --}}
                                <div class="form-group row">
                                    <label for="memo" class="col-md-4 col-form-label text-md-right">メモ</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('memo'))
                                            <textarea id="memo" class="form-control" type="text" name="memo" rows="4"
                                                value="{{ $visit->memo }}">{{ $visit->memo }}</textarea>
                                        @else
                                            <textarea id="memo" class="form-control is-invalid" type="text" rows="4"
                                                name="memo" value="{{ $visit->memo }}">{{ $visit->memo }}</textarea>
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('memo')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                {{-- 写真 --}}
                                {{-- <div class="mt-5 form-group row">
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
                                </div> --}}
                            </form>

                            {{-- <form action="{{ route('file.delete', ['id' => $customer->id]) }}" method="POST">
                                @csrf
                                <div class="form-group row mb-5 mt-4">
                                    <div class="col-md-8 offset-md-4 mx-auto">
                                        <input type="submit" type="submit" class="btn btn-primary btn-sm btn-dell-file"
                                            value="ファイルを削除">
                                    </div>
                                </div>
                            </form> --}}

                            <div class="btn-group mb-4 mt-4">
                                <form action="{{ route('visit.destroy', ['id' => $visit->id]) }}" method="POST">
                                    @csrf
                                    <div class="mr-5">
                                        <div class="">
                                            <button type="submit" class="btn btn-primary btn-sm btn-dell">
                                                <span>{{ __('来店記録を削除') }}</span>
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
                    if (confirm("この来店記録を本当に削除しますか？")) {
                        //そのままsubmit（削除）
                    } else {
                        //cancel
                        return false;
                    }
                });
            });

            // $(function() {
            //     $(".btn-dell-file").click(function() {
            //         if (confirm("ファイルを削除しますか？")) {
            //             //そのままsubmit（削除）
            //         } else {
            //             //cancel
            //             return false;
            //         }
            //     });
            // });
        </script>
    @endsection
