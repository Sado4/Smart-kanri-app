@extends('layouts.admin')

@section('description', '店舗スタッフ関連のページ')
@section('title', '店舗スタッフ一覧')
@section('pageCss')
<link href="{{ asset('css/staff.css') }}" rel="stylesheet" />
@endsection

@include('layouts.header_nav')

@include('layouts.side_nav')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>スタッフ一覧</h4>
                    </div>

                    <table>
                        <tr>
                            <th>スタッフ名</th>
                            <th>役割</th>
                        </tr>
                        @foreach($users as $staff)
                        <tr>
                            <td>{{ $staff->name }}</td>
                            <td>{{ $staff->position->name }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
