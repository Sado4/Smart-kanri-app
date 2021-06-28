@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">あなたが所属する店舗を作成します</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ url('/admin') }}" method="POST">
                        @csrf
                        <!-- /** バリデーションエラーをすべて表示 */ -->
                        @if(count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <div>
                            <span>①サロン名入力</span>
                            <p>店舗名を教えてください</p>
                            <input type="text" name="shop_name" value="{{ old('shop_name') }}" placeholder="店舗名">
                        </div>
                        <div>
                            <span>②業種選択</span>
                            <p>業種を選んでください</p>
                            <div>
                                <select name="sector_id">
                                    @foreach($sectors as $sector)
                                    <option value="{{ $sector->id }}">
                                        {{ $sector->name }}
                                    </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div>
                            <span>③確認</span>
                            <div>
                                <h6>セットアップ完了です。</h6>
                                <p>※自動で料金が発生することはありません。</p>
                                <input type="submit" value="店舗作成">
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection