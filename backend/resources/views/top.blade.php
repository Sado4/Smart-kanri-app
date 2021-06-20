@extends('layouts.body')

@section('title', 'Top Page')

@include('layouts.header')

@section('content')

<!-- header -->
<header>
    <div>
        <h1>Smart-管理</h1>
        <p>顧客の様々な情報をスマートに複数メンバーで管理するwebアプリ</p>
        <ul>
            <li>
                <a href="http://127.0.0.1:8080/register">無料ユーザー登録</a>
            </li>
        </ul>
    </div>
</header>
<!-- section1 -->
<section>
    <header>
        <h2>「顧客の情報を整理して管理したいけど、手書きだと時間もかかるし、難しいソフトなども使いたくない・・・」そんな声から生まれたアプリです。</h2>
    </header>
</section>
<!-- section2 -->
<section>
    <div>
        <section>
            <div>
                <img src="#">
            </div>
            <div>
                <h3>店舗のメンバーで共有して閲覧・編集</h3>
                <p>店舗内で、必要な顧客の情報や履歴をメンバー間で共有しながら連携して仕事を活性化できます。面倒な人的確認作業も、Smart-管理でスムーズに行えます。</p>
            </div>
        </section>

        <section>
            <div>
                <img src="#">
            </div>
            <div>
                <h3>検索機能・絞り込み機能で楽々確認</h3>
                <p>来店履歴や顧客は膨大な量になってくると、データを探す時に一苦労・・・。それでもスピーディーな確認を行うための検索と絞り込み機能を搭載しております。</p>
            </div>
        </section>

        <section>
            <div>
                <img src="#">
            </div>
            <div>
                <h3>いつでも空いた時間に簡単スマートに</h3>
                <p>パソコン・スマートフォン両方に対応しています。空いた時間でいつどこでも顧客の情報を管理することができます。</p>
            </div>
        </section>
    </div>
</section>
<!-- section3 -->
<section>
    <div>
        <header>
            <h2>今日から、Smart-管理でスマートな顧客対応を実現しましょう！</h2>
            <p>面倒な手続きや設定などは不要</p>
            <p>無料会員登録で簡単に導入できます！</p>
            <ul>
                <li>
                    <a href="http://127.0.0.1:8080/register">無料ユーザー登録</a>
                </li>
            </ul>
        </header>
    </div>
</section>
<!-- footer -->
<footer>
    <ul>
        <li>サイトポリシー</li>
        <li>プライバシーポリシー</li>
        <li>お問い合わせ</li>
    </ul>
    <p>
        <a href="http://127.0.0.1:8080/top">Smart-管理</a> © Developed by
        <a href="https://twitter.com/derasado">@derasado</a>
    </p>
</footer>
@endsection