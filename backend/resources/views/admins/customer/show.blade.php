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
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
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
                        <div class="sb-sidenav-menu-heading">店舗名</div>
                        <p class="border-bottom"></p>
                        <a class="nav-link" href="/admin">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            顧客情報一覧
                        </a>
                        <a class="nav-link" href="/admin">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            来店記録一覧
                        </a>
                        <div class="sb-sidenav-menu-heading">設定</div>
                        <p class="border-bottom"></p>
                        <a class="nav-link collapsed" href="/#">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            プロフィール
                        </a>

                        <a class="nav-link collapsed" href="/#">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            店舗
                        </a>

                        <a class="nav-link collapsed" href="/#">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
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

                        {{-- 名前などの先頭の情報 --}}
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div>
                                            <p>{{ $customer->kana }}</p>
                                            <h1>{{ $customer->name }}様</h1>
                                        </div>
                                        <div>
                                            <p>{{ $customer->sex }}</p>
                                            <p>{{ $age }}歳</p>
                                        </div>

                                        <div>
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
                                        </div>
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
                                        <div>
                                            <h1>基本情報</h1>
                                        </div>
                                        <div>
                                            <p>お名前</p>
                                            <p>{{ $customer->name }}</p>
                                        </div>
                                        <div>
                                            <p>よみがな</p>
                                            <p>{{ $customer->kana }}</p>
                                        </div>
                                        <div>
                                            <p>ID</p>
                                            <p>{{ $customer->management_id }}</p>
                                        </div>
                                        <div>
                                            <p>性別</p>
                                            <p>{{ $customer->sex }}</p>
                                        </div>
                                        <div>
                                            <h1>詳細情報</h1>
                                        </div>
                                        <div>
                                            <p>生年月日</p>
                                            <p>{{ $customer->birthday }}</p>
                                        </div>
                                        <div>
                                            <p>職業</p>
                                            <p>{{ $customer->job }}</p>
                                        </div>
                                        <div>
                                            <p>電話番号</p>
                                            <p>{{ $customer->tel }}</p>
                                        </div>
                                        <div>
                                            <p>メールアドレス</p>
                                            <p>{{ $customer->email }}</p>
                                        </div>
                                        <div>
                                            <p>来店動機(何が魅力で来店？)</p>
                                            <p>{{ $customer->motive }}</p>
                                        </div>
                                        <div>
                                            <p>当店をどこで見つけた？</p>
                                            <p>{{ $customer->where }}</p>
                                        </div>
                                        <div>
                                            <p>メモ</p>
                                            <p>{{ $customer->memo }}</p>
                                        </div>
                                        <div>
                                            <p>要望など</p>
                                            <p>{{ $customer->demand }}</p>
                                        </div>
                                        <div>
                                            <h1>写真</h1>
                                        </div>
                                        @if (!$customer->image == null)
                                            <div>
                                                <img width="250" height="250" src="{{ $customer->full_image_url }}">
                                            </div>
                                        @endif
                                        <div>
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
                        {{-- <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                来店記録一覧
                            </div>

                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12</td>
                                            <td>$86,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}
                    </div>
            </main>
        </div>
    </div>
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
