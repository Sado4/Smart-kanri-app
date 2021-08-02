@extends('layouts.admin')

@section('description', '来店履歴一覧を表示するページ')
@section('title', '来店履歴一覧')
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

                    <!-- 検索ボタン-->
                    <form class="d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"
                        action="{{ route('visit.index') }}" method="GET">
                        <div class="form-group">
                            <label text-md-right for="date">日時</label>
                            <div class="mb-3 form_deco">
                                <input class="form-control" type="search" name="date" id="date" placeholder="検索"
                                    aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            </div>

                            <label for="memo">メモ</label>
                            <div class="mb-3 form_deco">
                                <input class="form-control" type="search" name="memo" id="memo" placeholder="検索"
                                    aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            </div>
                        </div>

                        <div class="mb-4 mt-4 text-right">
                            <input type="submit" name="submit" value="検索する" class="btn btn-primary btn-lg">
                        </div>
                    </form>

                    <div class="card mb-4">
                        <div class="card-header change-h">
                            <i class="fas fa-table me-1 white-color"></i>
                            <span class="white-color">来店履歴一覧</span>
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
                                                    href="{{ route('visit.show', ['id' => $visit->id]) }}">{{ $visit->customer->name }}</a>
                                            </td>
                                            <td><a class="link"
                                                    href="{{ route('visit.show', ['id' => $visit->id]) }}">{{ $visit->user->name }}</a>
                                            </td>
                                            <td><a class="link"
                                                    href="{{ route('visit.show', ['id' => $visit->id]) }}">{{ $visit->memo }}</a>
                                            </td>
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
