@extends('dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa Thông Tin Sản Phẩm</title>
</head>

<body>
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <h2 class="text-center">Sửa Thông Tin Sản Phẩm</h2>
                    <form action="{{ route('product.update', $product_models->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label class="form-label">Tên Sản Phẩm</label>
                            <input type="text" name="name" class="form-control" value="{{ $product_models->name }}">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="image" class="form-control-file">
                            <img src="{{ asset('public/uploads/login/' . $product_models->image) }} "height="100px"
                                width="100px">
                            <span style="color:red;">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số Lượng</label>
                            <input type="text" name="amount" class="form-control" value="{{ $product_models->amount }}">
                        </div>
                        {{-- <div class="mb-3">
                <label  class="form-label">Ảnh</label>
                <img type="hidden" width="120px" height="100px" id="blah" src="" alt="your image" /> <br>
                <input accept="image/*" type='file' id="imgInp" name="image"  value="{{$product_models->image}}">
              </div> --}}

                        <div class="mb-3">
                            <label class="form-label">Giá</label>
                            <input type="text" name="price" class="form-control" value="{{ $product_models->price }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Sửa</button>
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