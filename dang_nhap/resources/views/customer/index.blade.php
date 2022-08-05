@extends('dashboard')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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
                    <tr class="item-{{ $customer->id }}">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>
                            @if ($customer->image)
                                <img src="{{asset($customer->image)}}" alt="ảnh lỗi" style="width: 120px ; height: 120px">
                            @else
                                {{'chưa có ảnh'}}
                            @endif
                        </td>
                        {{-- <td>
                            <img src="{{asset($customer->image)}}"height="120px"
                                width="120px">
                        </td> --}}

                        <td>{{ $customer->email }}</td>
                        <td>
                            <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-primary">Sửa</a>

                            <a href="{{ route('customer.destroy', $customer->id) }}" id="{{ $customer->id }}"
                                class="btn btn-danger delete" style="color:  aqua"
                                {{-- onclick="return confirm('Are you sure')" --}}
                                >Xóa</a>
                            {{-- <a href="#" class="btn btn-info">Xem</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('.delete').click(function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                // console.log(id);
                let href = $(this).data('href');
                let csrf = '{{ csrf_token() }}';
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: href,
                            method: 'DELETE',
                            data: {
                                _token: csrf
                            },
                            success: function(res) {
                                success: function(res) {
                                    Swal.fire(
                                        // console.log(res);
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                    $('.item-' + id).remove();
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
