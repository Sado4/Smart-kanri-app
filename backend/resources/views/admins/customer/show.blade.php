@extends('layouts.admin')

@section('description', '顧客情報の詳細を表示するページ')
@section('title', '顧客詳細')
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
                                <div class="mt-3">
                                    <h2>-基本情報-</h2>
                                </div>
                                <div style="max-width: 90%;" class="mx-auto">
                                    <p class="mt-3">{{ $customer->kana }}</p>
                                    <div>
                                        <h3 class="border-bottom">{{ $customer->name }} 様</h3>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <p>ID: {{ $customer->management_id }}</p>
                                </div>
                                <div class="mb-2">
                                    <p class="i-block mr-2">{{ $customer->sex }}</p>
                                    <p class="i-block ml-2">{{ $age }}歳</p>
                                </div>
                                <div class="mb-4">
                                    <a href="{{ route('visit.create', ['id' => $customer->id]) }}"><button type="submit"
                                            class="btn btn-primary card-h">
                                            来店記録を追加
                                        </button></a>
                                </div>

                                {{-- <div>
                                    <div>
                                        <a href="#"><button type="submit" class="btn btn-primary">
                                                来店記録を追加
                                            </button></a>
                                    </div>
                                    <div>
                                        <a href="#"><button type="submit" class="btn btn-primary">
                                                顧客情報を削除
                                            </button></a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>


                {{-- 来店情報 --}}
                {{-- <div>
                    <div>
                        <div>
                            <h1>来店情報</h1>
                        </div>
                        <div>
                            <p>¥0</p>
                            <p>総支払額</p>
                        </div>
                        <div>
                            <p>¥0</p>
                            <p>平均単価</p>
                        </div>
                        <div>
                            <p>¥0</p>
                            <p>来店回数</p>
                        </div>
                        <div>
                            <p>¥0</p>
                            <p>最終来店日</p>
                        </div> --}}


                {{-- 基本情報 --}}
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="mt-3 mb-3">

                                    <div class="mb-3">
                                        <h2>-詳細情報-</h2>
                                    </div>
                                    <div style="max-width: 90%;" class=" mx-auto mt-4">
                                        <p class="small">生年月日</p>
                                        <p class="mx-auto border-bottom">{{ $customer->birthday }}</p>
                                    </div>
                                    <div style="max-width: 90%;" class=" mx-auto mt-4">
                                        <p class="small">職業</p>
                                        <p class="mx-auto border-bottom">{{ $customer->job }}</p>
                                    </div>
                                    <div style="max-width: 90%;" class=" mx-auto mt-4">
                                        <p class="small">電話番号</p>
                                        <p class="mx-auto border-bottom">{{ $customer->tel }}</p>
                                    </div>
                                    <div style="max-width: 90%;" class=" mx-auto mt-4">
                                        <p class="small">メールアドレス</p>
                                        <p class="mx-auto border-bottom">{{ $customer->email }}</p>
                                    </div>
                                    <div style="max-width: 90%;" class=" mx-auto mt-4">
                                        <p class="small">来店動機(何が魅力で来店？)</p>
                                        <p class="mx-auto border-bottom">{{ $customer->motive }}</p>
                                    </div>
                                    <div style="max-width: 90%;" class=" mx-auto mt-4">
                                        <p class="small">当店をどこで見つけた？</p>
                                        <p class="mx-auto border-bottom">{{ $customer->where }}</p>
                                    </div>
                                    <div style="max-width: 90%;" class="mt-4 mx-auto">
                                        <p class="small">メモ</p>
                                        <div class="box-m">
                                            <p class="mx-auto">{{ $customer->memo }}</p>
                                        </div>
                                    </div>
                                    <div style="max-width: 90%;" class=" mx-auto mt-4">
                                        <p class="small">要望など</p>
                                        <div class="box-m">
                                            <p class="mx-auto">{{ $customer->demand }}</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-4">
                                        <h6>写真</h6>
                                    </div>
                                    @if (!$customer->image == null)
                                        <div>
                                            <img width="250" height="250" src="{{ $customer->full_image_url }}">
                                        </div>
                                    @endif
                                    <div class="mb-3 mt-5">
                                        <a href="{{ route('customer.edit', ['id' => $customer->id]) }}"><button
                                                type="submit" class="btn btn-primary">
                                                編集する
                                            </button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- 来店記録 --}}
                    <div class="card mb-4 mt-5">
                        <div class="card-header change-h">
                            <i class="fas fa-table me-1 white-color"></i>
                            <span class="white-color">来店履歴</span>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="link">
                                <thead>
                                    <tr>
                                        <th><span class="login-button">日時</span></th>
                                        <th><span class="login-button">顧客名</span></th>
                                        <th><span class="login-button">担当者</span></th>
                                        <th><span class="login-button">メモ</span></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th><span class="login-button">日時</span></th>
                                        <th><span class="login-button">顧客名</span></th>
                                        <th><span class="login-button">担当者</span></th>
                                        <th><span class="login-button">メモ</span></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($visits as $visit)
                                        <tr>
                                            <td><a class="link"
                                                    href="{{ route('visit.show', ['id' => $visit->id]) }}">{{ $visit->date }}</a>
                                            </td>
                                            <td><a class="link"
                                                    href="{{ route('visit.show', ['id' => $visit->id]) }}">{{ $customer->name }}</a>
                                            </td>
                                            <td><a class="link"
                                                    href="{{ route('visit.show', ['id' => $visit->id]) }}">{{ $visit->user->name }}</a>
                                            </td>
                                            <td><a class="link"
                                                    href="{{ route('visit.show', ['id' => $visit->id]) }}">{{ $visit->memo }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
