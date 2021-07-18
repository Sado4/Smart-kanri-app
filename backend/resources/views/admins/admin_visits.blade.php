@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">来店記録一覧</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div>
                        <form>
                            <div>
                                <label>来店日</label>
                                <div>
                                    <div>
                                        <input type="text" placeholder="未指定">
                                    </div>
                                    <p>～</p>
                                    <div>
                                        <input type="text" placeholder="未指定">
                                    </div>
                                    <p>まで</p>
                                </div>
                            </div>

                            <div>
                                <label>主担当</label>
                                <div>
                                    <div>
                                        <input type="text" placeholder="すべて     ▼">
                                    </div>
                                    <div>
                                        <span>並べ替え↓</span>
                                        <span>絞り込み→</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label>メモ</label>
                                <div>
                                    <input type="text" placeholder="🔎検索">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div>
                        <form>
                            <div>
                                <input type="text" placeholder="施術が新しい順 ▼">
                            </div>
                        </form>
                        <div>
                            <div>
                                <p>1-2(2件中)</p>
                                <button type="button"><span>
                                        < </span></button>
                                <button type="button"><span> > </span></button>
                            </div>
                            <div>
                                <button type="button"><span>🔄</span></button>
                            </div>
                        </div>
                    </div>

                    <div>
                        <a href="#">3 テスト様</a>
                    </div>

                    <div>
                        <div>
                            <div>
                                <p>1-2(2件中)</p>
                                <button type="button"><span>
                                        < </span></button>
                                <button type="button"><span> > </span></button>
                            </div>
                            <div>
                                <button type="button"><span>🔄</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
