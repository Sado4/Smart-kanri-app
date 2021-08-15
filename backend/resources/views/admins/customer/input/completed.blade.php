@extends('layouts.css_none_admin')

@section('description', 'お客様自身に情報を入力して完了したあとの確認ページ')
@section('title', 'お客様情報入力完了')
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
                <div class="card-header card-h text-center">お客様情報入力完了</div>

                <div class="card-body text-center">

                    <div class="mb-4 mt-2">
                        <h5>{{ $customer->name }}様</h5>
                    </div>
                    <div>
                        <p>入力のご協力ありがとうございました。</p>
                        <p>機器を担当スタッフにご返却下さい。</p>
                    </div>

                    <div class="text-center mt-5 mb-4">
                        <a href="{{ route('customer.show', ['id' => $customer->id]) }}"><button style="width: 150px;" type="submit" class="btn btn-primary">
                            <span>{{ __('入力情報確認') }}</span>
                        </button></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
