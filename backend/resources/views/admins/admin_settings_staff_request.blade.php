@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>スタッフ関連設定</h4>
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
                        <h4>所属申請一覧</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection