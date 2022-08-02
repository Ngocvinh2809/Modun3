<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa Thông Tin</title>
</head>

<body>
  @extends('layout.admin.dashboar')
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
          <h2 class="text-center">Sửa Thông Tin Khách Hàng</h2>
          <form action="{{route('customer.update',$customers->id)}}" method="post">
            @csrf
            @method("PUT")
              <div class="mb-3">
                <label class="form-label">Họ Và Tên</label>
                <input type="text" name="name" class="form-control" value="{{$customers->name}}">
              </div>
              <div class="mb-3">
                <label  class="form-label">Số Điện Thoại</label>
                <input type="text" name="phone" class="form-control" value="{{$customers->phone}}">
              </div>
              <div class="mb-3">
                <label  class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{$customers->email}}">
              </div>
              <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
        </div>
        <div class="col-4"></div>
      </div>
        
    </div>
@endsection

</body>
</html>