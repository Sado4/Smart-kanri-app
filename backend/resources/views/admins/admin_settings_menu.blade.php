@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">メニュー設定</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div>
                        <div>
                            <h4>メニュー一覧</h4>
                        </div>
                        <div>
                            <div>
                                <p>メニュー名</p>
                            </div>
                            <div>
                                <button>
                                    <span> +</span>
                                </button>
                            </div>
                            <div>
                                <div>
                                    <p>ソフトジェル10本</p>
                                </div>
                                <div>
                                    <p>¥5,000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection