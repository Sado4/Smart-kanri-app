@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">認証メールをご確認して下さい</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        メールが送信されました。
                    </div>
                    @endif
                    <p>
                        登録されたメールアドレス宛てに、認証メールを送信しました。<br>
                        メールをご確認いただき、認証を完了してください。
                    </p><br>
                    <div class="col-md-6 offset-md-4">
                        <a href="http://127.0.0.1:8080/register/setup"><button type="submit" class="btn btn-primary">
                                {{ __('メール認証が完了しました') }}
                            </button></a>
                    </div>

                </div>
                <div>
                    <h4>※メールが届かない場合</h4>
                    <ul>
                        <li>メールアドレスを間違って入力していないかご確認下さい。</li>
                        <li>メールが迷惑メールフォルダに振り分けれる場合がございます。一度迷惑メールフォルダをご確認ください。</li>
                    </ul>
                </div>
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline"> {{ __('認証メールを再送する') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection