@extends('layouts.master')
@section('content')
    <div class="title m-b-md">
        Raising the bar
    </div>
    <a href="{{ route('user.logout') }}">
        {{-- <h1 class="title text-warning">{{$value}}</h1> --}}
        <button type="button" class="btn btn-outline-primary">Đăng Xuất</button>
    </a>
    <hr>
@endsection