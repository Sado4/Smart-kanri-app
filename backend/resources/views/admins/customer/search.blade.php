@extends('layouts.admin')

@section('description', '顧客検索後のページ')
@section('title', '顧客検索')
@section('pageCss')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
@endsection

@include('layouts.header_nav')

@include('layouts.side_nav')

@section('content')

            <main>
                <div class="container-fluid px-4">
                    <div class="card-body">
                        <div>
                            <div>
                                <a href="{{ route('customer.create') }}"><button type="button"
                                        class="btn btn-primary btn-lg mb-3" data-toggle="modal"
                                        data-target="#sampleModal">
                                        + 顧客情報新規作成
                                    </button></a>
                                <p class="border-bottom"></p>
                            </div>

                            <!-- 検索ボタン-->
                            <form class="d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"
                                action="{{ route('admin') }}" method="GET">
                                <div class="form-group">
                                    <label text-md-right for="name">名前</label>
                                    <div class="mb-3 form_deco">
                                        <input class="form-control" type="search" name="name" id="name" placeholder="検索"
                                            aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                                    </div>

                                    <label for="management_id">ID</label>
                                    <div class="mb-3 form_deco">
                                        <input class="form-control" type="search" name="management_id" id="management_id" placeholder="完全一致検索"
                                            aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                                    </div>

                                    <label for="memo">メモ</label>
                                    <div class="mb-3 form_deco">
                                        <input class="form-control" type="search" name="memo" id="memo" placeholder="検索"
                                            aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                                    </div>

                                    <label for="tel">電話番号</label>
                                    <div class="mb-4 form_deco">
                                        <input class="form-control" type="search" name="tel" id="tel"
                                            placeholder="完全一致検索" aria-label="Search for..."
                                            aria-describedby="btnNavbarSearch" />
                                    </div>

                                </div>

                                <div class="mb-4 text-right">
                                    <input type="submit" name="submit" value="検索する" class="btn btn-primary btn-lg">
                                </div>
                            </form>

                            <div class="card mb-4">
                                <div class="card-header change-h">
                                    <i class="fas fa-table me-1 white-color"></i>
                                       <span class="white-color">顧客データ一覧</span>

                                </div>
                                <div class="card-body">
                                    <table id="datatablesSimple" class="link">
                                        <thead>
                                            <tr>
                                                <th><span class="login-button">ID</span></th>
                                                <th><span class="login-button">顧客名</span></th>
                                                <th><span class="login-button">年齢</span></th>
                                                <th><span class="login-button">電話番号</span></th>
                                                <th><span class="login-button">生年月日</span></th>
                                                <th><span class="login-button">メールアドレス</span></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th><span class="login-button">ID</span></th>
                                                <th><span class="login-button">顧客名</span></th>
                                                <th><span class="login-button">年齢</span></th>
                                                <th><span class="login-button">電話番号</span></th>
                                                <th><span class="login-button">生年月日</span></th>
                                                <th><span class="login-button">メールアドレス</span></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($search as $customer)
                                                <tr>
                                                    <td><a class="link" href="admin/customer/{{ $customer->id }}">{{ $customer->management_id }}</a>
                                                    </td>
                                                    <td><a class="link" href="admin/customer/{{ $customer->id }}">{{ $customer->name }}</a></td>
                                                    <td><a class="link"
                                                            href="admin/customer/{{ $customer->id }}">{{ \Carbon\Carbon::parse($customer->birthday)->age }}
                                                        </a></td>
                                                    <td><a class="link" href="admin/customer/{{ $customer->id }}">{{ $customer->tel }}</a></td>
                                                    <td><a class="link" href="admin/customer/{{ $customer->id }}">{{ $customer->birthday }}</a></td>
                                                    <td><a class="link" href="admin/customer/{{ $customer->id }}">{{ $customer->email }}</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; <a href="{{ route('top') }}">Smart-管理</a> 2021</div>
                        <div>
                            Developed by
                            <a href="https://twitter.com/derasado" target="_blank">@derasado</a>


                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @endsection
