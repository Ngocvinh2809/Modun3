@extends('dashboard')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <div class="container">
        <h1 class="text-center">Danh sách khách hàng</h1>
        <div class="col-12">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ Session::get('success') }}
                </p>
            @endif
        </div>
        <a href="{{ route('customer.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus"></i>
             Thêm Khách Hàng
        </a>
        <hr />
        <table class="table table-bordered" border="2" style="width: 1000px">

            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Khách Hàng</th>
                    <th>Số Điện Thoại </th>
                    <th>Ảnh</th>
                    <th>Email</th>
                    <th>Hoạt Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $key => $customer)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->phone }}</td>
                        {{-- <td>
                            @if($customer->image)
                                <img src="{{$customer->image}}" alt="ảnh lỗi" style="width: 120px ; height: 120px">
                            @else
                                {{'chưa có ảnh'}}
                            @endif
                        </td> --}}
                        <td >
                            <img src="{{asset('public/uploads/login/'.$customer->image)}} "height="120px" width="120px">
                        </td>

                        <td>{{ $customer->email }}</td>
                        <td>
                            <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-primary">Sửa</a>
                            
                            <a href="{{ route('customer.destroy', $customer->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure')">Xóa</a>
                            {{-- <a href="#" class="btn btn-info">Xem</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   
@endsection

