@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">店舗基本設定</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div>
                        <h4>店舗名の設定</h4>
                    </div>
                    <form>
                        <div>
                            <input type="text" placeholder="店舗名">
                        </div>
                    </form>
                    <div>
                        <button><span>変更を保存</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection