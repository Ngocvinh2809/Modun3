@extends('dashboard')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <div class="container">
        <h1 class="text-center">Danh sách Sản Phẩm</h1>
        <div class="col-12">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ Session::get('success') }}
                </p>
            @endif
        </div>
        <a href="{{ route('product.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus"></i>
            Thêm Sản Phẩm

        </a>
        <hr />
        <table class="table table-bordered" border="2" style="width: 1000px">

            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Ảnh</th>
                    <th>Số Lượng </th>
                    <th>Giá</th>
                    <th>Hoạt Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_models as $key => $product)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td >
                            <img src="{{asset('public/uploads/login/'.$product->image)}}" height="120px" width="120px">
                        </td>
                        <td>{{ $product->amount }}</td>
                        {{-- <td>
                            @if($product->image)
                                <img src="{{$product->image}}" alt="ảnh lỗi" style="width: 120px ; height: 120px">
                            @else
                                {{'chưa có ảnh'}}
                            @endif
                        </td> --}}
                        

                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Sửa</a>
                            
                            <a href="{{ route('product.destroy', $product->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure')">Xóa</a>
                            {{-- <a href="#" class="btn btn-info">Xem</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
