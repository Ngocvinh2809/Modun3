@extends('dashboard')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <div class="container">
        <h1 class="text-center">Danh sách nhân viên</h1>
        <div class="col-12">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ Session::get('success') }}
                </p>
            @endif
        </div>
        <a href="{{ route('staff.create') }}" class="btn btn-primary"><i class="bi bi-person-plus"></i>Thêm nhân viên</a>
        <hr />
        <table class="table table-bordered" border="2" style="width: 1000px">

            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Nhân Viên</th>
                    <th>Số Điện Thoại </th>
                    <th>Ngày Làm Việc </th>
                    <th>Địa Chỉ</th>
                    <th>Lương</th>
                    <th>Hoạt Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $key => $staff)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->phone }}</td>
                        <td>{{ $staff->day_working }}</td>
                        <td>{{ $staff->address }}</td>
                        <td>{{ $staff->wage }}</td>
                        {{-- <td>
                            @if($staff->image)
                                <img src="{{$staff->image}}" alt="ảnh lỗi" style="width: 120px ; height: 120px">
                            @else
                                {{'chưa có ảnh'}}
                            @endif
                        </td> --}}
                        {{-- <td >
                            <img src="{{asset('public/uploads/login/'.$staff->image)}} "height="120px" width="120px">
                        </td> --}}

                        {{-- <td>{{ $staff->email }}</td> --}}
                        <td>
                            <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-primary">Sửa</a>
                            <a href="{{ route('staff.destroy', $staff->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure')">Xóa</a>
                            {{-- <a href="#" class="btn btn-info">Xem</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection
