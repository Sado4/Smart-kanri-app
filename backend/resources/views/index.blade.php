<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="顧客管理システムでスマートに顧客を管理できるWebアプリケーションの「Smart-管理」" />
    <meta name="author" content="@derasado" />
    <title>TOP - Smart-管理</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/index.css" rel="stylesheet" />
    <link href="css/top.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container px-5">
            <a class="navbar-brand" href="#page-top">Smart-管理</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">ログイン</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">ユーザー登録</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5">
                <h1 class="masthead-heading mb-0">Smart-管理</h1>
                <p class="mb-0 lead h6">顧客の様々な情報をスマートに<br>複数メンバーで管理するwebアプリ</p>
                <a class="btn btn-primary btn-xl rounded-pill mt-5" href="{{ route('register') }}">無料ユーザー登録</a>
            </div>
        </div>
        <div class="bg-circle-1 bg-circle"></div>
        <div class="bg-circle-2 bg-circle"></div>
        <div class="bg-circle-3 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>
    </header>

    <!-- section0 -->
    <section id="scroll">
        <div class="container">
            <div class="row gx-5 align-items-center">
                <div class="">
                    <div class="p-5">
                        <h2 class="display-5 d-flex justify-content-center">実際の声から生まれたアプリ</h2>
                        <p class="text-center mt-4">「顧客の情報を整理して管理したい、でも手書きだと時間もかかるし難しいソフトなども使いたくない・・・」などの声から誕生しました。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content section 1-->
    <section id="scroll">
        <div class="container">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5"><img class="img-fluid rounded-circle" src="{{ asset('img/01.jpg')}}" alt="..." /></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-5">店舗のメンバーで共有して閲覧・編集</h2>
                        <p>店舗内で、必要な顧客の情報や履歴をメンバー間で共有しながら連携して仕事を効率化できます。<br>面倒な人的確認作業も、Smart-管理でスムーズに行えます。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content section 2-->
    <section>
        <div class="container">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="p-5"><img class="img-fluid rounded-circle" src="{{ asset('img/02.png')}}" alt="..." /></div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-5">検索機能・絞り込み機能で楽々確認</h2>
                        <p>来店履歴や顧客は膨大な量になってくると、データを探す時に一苦労・・・。<br>それでもスピーディーな確認を行うための検索と絞り込み機能を搭載しております。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content section 3-->
    <section>
        <div class="container">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5"><img class="img-fluid rounded-circle" src="{{ asset('img/03.png')}}" alt="..." /></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-5">いつでも空いた時間に簡単スマートに</h2>
                        <p>パソコン・スマートフォン両方に対応しています。<br>空いた時間でいつどこでも顧客の情報を管理することができます。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section4 -->
    <section id="scroll">
        <div class="container">
            <div class="row gx-5 align-items-center">
                <div class="">
                    <div class="p-5">
                        <h2 class="display-5 d-flex justify-content-center text-center">今日からSmart-管理でスマートな<br>顧客対応を実現しましょう！</h2>
                        <p class="text-center mt-4">面倒な手続きや設定などは不要
                        <p class="text-center mt-4">無料会員登録で簡単に導入できます！
                        </p>
                        <div class="text-center"><a class="btn btn-primary btn-xl rounded-pill mt-5" href="{{ route('register') }}">無料ユーザー登録</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-black">
        <div class="container">
            <ul class="policy">
                <li><a href="{{ route('terms') }}">サイトポリシー</a></li>
                <li><a href="{{ route('privacy') }}">プライバシーポリシー</a></li>
            </ul>
            <p class="m-0 text-center">Copyright &copy; <a href="#page-top">Smart-管理</a> 2021
                Developed by
                <a href="https://twitter.com/derasado" target="_blank">@derasado</a>
            </p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/index.js"></script>
</body>

</html>
