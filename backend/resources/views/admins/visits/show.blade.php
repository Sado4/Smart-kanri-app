@extends('layouts.admin')

@section('description', '来店情報の詳細を表示するページ')
@section('title', '来店記録詳細')
@section('pageCss')

@endsection

@include('layouts.header_nav')

@include('layouts.side_nav')

@section('content')
    <main>
        <div class="container-fluid px-4 text-center">
            <div class="card-body">

                {{-- 名前などの先頭の情報 --}}
                <div class="container mb-3">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div style="max-width: 90%;" class="mx-auto">
                                    <p class="mt-3">{{ $visit->customer->kana }}</p>
                                    <div class="mb-3">
                                        <h3 class="border-bottom">{{ $visit->customer->name }} 様</h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                {{-- 基本情報 --}}
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="mt-3 mb-3">

                                    <div class="mb-3">
                                        <h2>-来店記録-</h2>
                                    </div>
                                    <div style="max-width: 90%;" class=" mx-auto mt-4">
                                        <p class="small">来店日時</p>
                                        <p class="mx-auto border-bottom">{{ $visit->date }}</p>
                                    </div>
                                    <div style="max-width: 90%;" class=" mx-auto mt-4">
                                        <p class="small">担当者</p>
                                        <p class="mx-auto border-bottom">{{ $visit->user->name }}</p>
                                    </div>
                                    <div style="max-width: 90%;" class="mt-4 mx-auto">
                                        <p class="small">メモ</p>
                                        <div class="box-m">
                                            <p class="mx-auto">{{ $visit->memo }}</p>
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-5">
                                        <a href="{{ route('visit.edit', ['id' => $visit->id]) }}"><button type="submit"
                                                class="btn btn-primary">
                                                編集する
                                            </button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </main>
@endsection
