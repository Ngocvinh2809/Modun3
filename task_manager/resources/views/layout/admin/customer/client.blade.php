<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm Khách Hàng</title>
</head>
<body>
  @extends('layout.admin.dashboar')
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
          <h1> Thêm Khách Hàng</h1>
          <form action="{{route('customer.store')}}" method="POST">
              @csrf
              {{-- @method('PUT') --}}
              <div class="mb-3">
                <label class="form-label">Họ Và Tên</label>
                <input name="name" type="text" class="form-control" >
              </div>
              <div class="mb-3">
                <label  class="form-label">Số Điện Thoại</label>
                <input name="phone" type="text" class="form-control"">
              </div>
              <div class="mb-3">
                <label  class="form-label">Email</label>
                <input name="email" type="email" class="form-control"">
              </div>
              <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
        <div class="col-4"></div>
      </div>
    </div>
@endsection

</body>
</html>