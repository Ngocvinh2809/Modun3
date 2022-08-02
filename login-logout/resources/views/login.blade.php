@extends('layouts.master')
@section('content')
    <div class="title m-b-md">
        Đăng nhập
    </div>
    <div class="form-login">
        <form class="text-left" method="post" action="{{ route('user.login') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputUsername">Tên người dùng</label>
                <input type="text" class="form-control" id="inputUsername" name="inputUsername"
                    placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
    </div>
    <!-- Hiển thị thông báo đăng nhập thành công hay không -->
    @if (Session::has('login-fail'))
        <div class="login-fail">
            <p class="text-danger">{{ Session::get('login-fail') }}</p>
        </div>
    @endif
    <!-- Hiển thị trạng thái chưa đăng nhập -->
    @if (Session::has('not-login'))
        <div class="not-login">
            <p class="text-danger">{{ Session::get('not-login') }}</p>
        </div>
    @endif
@endsection
