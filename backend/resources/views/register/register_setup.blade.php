@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-h text-center">ユーザ登録が完了しました</div>

                    <div class="card-body">

                        <div class="text-center mt-2">
                            <p>①店舗を新規作成しますか？</p>
                        </div>

                        <div class="col-md-6 mail-m text-center">
                            <a href="{{ route('setup.new') }}"><button type="submit" class="btn btn-primary">
                                    {{ __('店舗のセットアップへ') }}
                                </button></a>
                        </div>

                        <div class="text-center mt-5">
                            <p>②既に他のスタッフが店舗を作成していますか？</p>
                        </div>
                        <div class="col-md-6 mail-m text-center mb-3">
                            <a href="{{ route('setup.join') }}"><button type="submit" class="btn btn-primary">
                                    {{ __('作成済の店舗に所属する') }}
                                </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
