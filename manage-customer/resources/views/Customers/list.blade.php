@extends('home')
@section('title', 'Danh sách khách hàng')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Danh Sách Khách Hàng</h1>
            </div>
            <a class="btn btn-primary" href="{{ route('customers.create') }}">Thêm mới</a>
            <hr>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Ngày Sinh</th>
                        <th scope="col">Email</th>
                        <th>Hoạt Động</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($customers) == 0)
                        <tr>
                            <td colspan="4">Không có dữ liệu</td>
                        </tr>
                    @else
                        @foreach ($customers as $key => $customer)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->dob }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary">sửa</a>
                                    <a href="{{ route('customers.destroy', $customer->id) }}"class="btn btn-danger"
                                        onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
