@extends('layout.admin.dashboar')
@section('content')
<div class="container">
    <h1 class="text-center">Danh sách khách hàng</h1>
    <a href="{{route('customer.create')}}" class="btn btn-primary">Thêm</a>
    <hr />
    <table class="table table-striped table-bordered" border="2" style="width: 1300px">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Khách Hàng</th>
                <th>Số Điện Thoại </th>
                <th>Email</th>
                <th>Hoạt Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $key=> $customer) 
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->email}}</td>
                    <td>
                        <a href="{{route('customer.edit',$customer->id)}}" class="btn btn-primary">Sửa</a>
                        {{-- <a href="#" class="btn btn-info">Xem</a> --}}
                        {{-- <br> --}}
                        <form action="{{route('customer.delete',$customer->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                        <input type="submit" value="Xóa" class="btn btn-danger" >
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    {{-- @endsection --}}
@endsection