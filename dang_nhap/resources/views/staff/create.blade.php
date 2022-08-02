@extends('dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm Nhân Viên</title>
</head>

<body>

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <h1> Thêm Nhân Viên</h1>
                    <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="mb-3">
                            <label class="form-label">Họ Và Tên</label>
                            <input name="name" type="text" class="form-control">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label class="form-label">Số Điện Thoại</label>
                            <input name="phone" type="text" class="form-control"">
                        </div>
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        {{-- <div class="mb-3"> 
                <img type="hidden" width="120px" height="100px" id="blah" src="#" alt="your image" /> <br>
                <input accept="image/*" type='file' id="imgInp" name="image" />
                <label  class="form-label">Ảnh</label>
                {{-- <input name="image" type="file" class="form-control-file"> --}}
                        {{-- </div> --}}
                        {{-- <div class="mb-3">
                <label for="exampleInputtext1" >Hình ảnh </label>
                <input type="file" name="image" class="form-control-file">
                <span style="color:red;">@error('image'){{ $message }} @enderror</span>
              </div> --}}
                        <div class="mb-3">
                            <label class="form-label">Ngày Làm Việc</label>
                            <input name="day_working" type="date" class="form-control">
                        </div>
                        @error('day_working')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label class="form-label">Địa Chỉ</label>
                            <input name="address" type="text" class="form-control">
                        </div>
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label class="form-label">Lương</label>
                            <input name="wage" type="text" class="form-control">
                        </div>
                        @error('wage')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <button class="btn btn-secondary" onclick="window.history.back(); return false">Hủy</button>
                    </form>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    @endsection
</body>
<script>
    jQuery(document).ready(function() {
        jQuery('#imgInp').change(function() {
            const file = jQuery(this)[0].files;
            if (file[0]) {
                jQuery('#blah').attr('src', URL.createObjectURL(file[0]));
            }
        });
    });
</script>

</html>
