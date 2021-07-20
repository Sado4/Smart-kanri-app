<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="顧客管理システムでスマートに顧客を管理できるWebアプリケーションの「Smart-管理」の管理画面" />
    <meta name="author" content="@derasado" />
    <title>管理画面 - Smart-管理</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin_auth.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/admin">Smart-管理<br>管理ボード</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        <!-- auth組み込み部分ここから貼り付け -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('ユーザー登録') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>


    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">店舗名：{{ $user->shop->name }}</div>
                        <p class="border-bottom"></p>
                        <a class="nav-link" href="/admin">
                            <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                            顧客情報一覧
                        </a>
                        <a class="nav-link" href="/admin">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            来店記録一覧
                        </a>
                        <div class="sb-sidenav-menu-heading">設定</div>
                        <p class="border-bottom"></p>
                        <a class="nav-link collapsed" href="/#">
                            <div class="sb-nav-link-icon"><i class="bi bi-person-circle"></i></div>
                            プロフィール
                        </a>

                        <a class="nav-link collapsed" href="/#">
                            <div class="sb-nav-link-icon"><i class="bi bi-shop"></i></div>
                            店舗
                        </a>

                        <a class="nav-link collapsed" href="/#">
                            <div class="sb-nav-link-icon"><i class="bi bi-person-lines-fill"></i></div>
                            スタッフ
                        </a>
                        <a class="nav-link collapsed" href="/#">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            メニュー
                        </a>
                    </div>
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
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
                                        <input class="form-control" type="search" name="management_id"
                                            id="management_id" placeholder="完全一致検索" aria-label="Search for..."
                                            aria-describedby="btnNavbarSearch" />
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
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    顧客データ一覧
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
                                            @foreach ($customers as $customer)
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
                        <div class="text-muted">Copyright &copy; <a href="#page-top">Smart-管理</a> 2021</div>
                        <div>
                            Developed by
                            <a href="https://twitter.com/derasado" target="_blank">@derasado</a>


                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
</body>

</html>
