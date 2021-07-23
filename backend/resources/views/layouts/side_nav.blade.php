@section('side_nav')
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
                        <a class="nav-link" href="{{ route('admin') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            来店記録一覧
                        </a>
                        <div class="sb-sidenav-menu-heading">設定</div>
                        <p class="border-bottom"></p>
                        <a class="nav-link collapsed" href="{{ route('profile.show') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-person-circle"></i></div>
                            プロフィール
                        </a>

                        <a class="nav-link collapsed" href="{{ route('shop.setting') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-shop"></i></div>
                            店舗
                        </a>

                        <a class="nav-link collapsed" href="{{ route('staff.index') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-person-lines-fill"></i></div>
                            スタッフ
                        </a>
                        <a class="nav-link collapsed" href="{{ route('admin') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            メニュー
                        </a>
                    </div>
                </div>

            </nav>
        </div>
@endsection
