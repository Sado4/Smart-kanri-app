@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>顧客管理</h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div>
                        <div>
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#sampleModal">
                                + 顧客情報新規作成
                            </button>
                        </div>

                        <div>
                            <form>
                                <div>
                                    <label>名前</label>
                                    <div>
                                        <input type="text" placeholder="🔍検索">
                                    </div>
                                </div>
                            </form>

                            <form>
                                <div>
                                    <label>ID</label>
                                    <div>
                                        <input type="text" placeholder="🔍検索">
                                    </div>
                                </div>
                            </form>

                            <form>
                                <div>
                                    <label>メモ</label>
                                    <div>
                                        <input type="text" placeholder="🔍検索">
                                    </div>
                                </div>
                            </form>

                            <form>
                                <div>
                                    <label>電話番号</label>
                                    <div>
                                        <input type="text" placeholder="🔍完全一致検索">
                                    </div>
                                </div>
                            </form>

                            <div>
                                <span>並べ替え↓</span>
                                <span>絞り込み→</span>
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal">
                                    検索する
                                </button>
                            </div>
                        </div>

                        <div>
                            <span>●～●(件中) <></span>
                            <p>3 テスト様</p>
                            <span>●～●(件中) <></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- モーダル・ダイアログ -->
<div class="modal fade" id="sampleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                <h4 class="modal-title">タイトル</h4>
            </div>
            <div class="modal-body">
                本文
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                <button type="button" class="btn btn-primary">ボタン</button>
            </div>
        </div>
    </div>
</div>
@endsection