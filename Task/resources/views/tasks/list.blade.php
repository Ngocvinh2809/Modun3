@extends('index')
@section('title', 'Danh sách công viêc')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Danh sách công viêc</h2>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Thêm mới</a>
<hr>
        </div>
        <div class="col-12">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ Session::get('success') }}
                </p>
            @endif
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên công việc</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Ảnh</th>
                    {{-- <th scope="col">Ngày hết hạn</th> --}}
                    <th>Hoạt Động</th>
                    
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $key => $task)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->content }}</td>
                        <td>
                            @if($task->image)
                                <img src="{{ asset('storage/'.$task->image) }}" alt="" style="width: 100px; height: 100px">
                            @else
                                {{'Chưa có ảnh'}}
                            @endif
                        </td>
                       
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">sửa</a>
                            <a href="{{ route('tasks.destroy', $task->id) }}" class="btn btn-danger"
                                 onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a>
                            </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection