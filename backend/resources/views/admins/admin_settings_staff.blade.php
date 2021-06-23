@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>スタッフ関連設定</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div>
                        <div>
                            <button><span>スタッフ一覧</span></button>
                        </div>
                        <div>
                            <button><span>所属申請</span></button>
                        </div>
                    </div>

                <div>
                    <h4>スタッフ一覧</h4>
                    <div>
                        <ul>
                        <li>スタッフ名</li>
                        <li>役割</li>
                        <li>編集</li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection