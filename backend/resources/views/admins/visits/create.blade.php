@extends('layouts.css_none_admin')

@section('description', '来店記録を新規作成するページ')
@section('title', '来店記録新規作成')
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
                        <div class="card-header card-h text-center">来店記録作成</div>

                        <div class="card-body text-center">
                            <form method="POST" action="{{ route('visit.store', ['id' => $customer->id]) }}"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- 来店日時 --}}
                                <div class="form-group row">
                                    <label for="date" class="col-md-4 col-form-label text-md-right">来店日時</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('date'))
                                            <input id="date" class="form-control" type="date" name="date"
                                                value="{{ old('date') }}">
                                        @else
                                            <input id="date" class="form-control is-invalid" type="date" name="date"
                                                value="{{ old('date') }}">
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
                                                <option value="{{ $staff->id }}">
                                                    {{ $staff->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- メモ --}}
                                <div class="form-group row">
                                    <label for="memo" class="col-md-4 col-form-label text-md-right">メモ</label>
                                    <div class="col-md-6">
                                        @if (count($errors) == 0 || !$errors->has('memo'))
                                            <textarea rows="4" id="memo" class="form-control" type="text" name="memo"
                                                value="{{ old('memo') }}">{{ old('memo') }}</textarea>
                                        @else
                                            <textarea rows="4" id="memo" class="form-control is-invalid" type="text"
                                                name="memo" value="{{ old('memo') }}">{{ old('memo') }}</textarea>
                                        @endif

                                        @if (count($errors) > 0)
                                            @error('memo')
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

                                @csrf
                                <div class="text-center mt-5 mb-3">
                                    <a href="{{ route('customer.show', ['id' => $customer->id]) }}"><button type="submit" class="btn btn-primary">
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
