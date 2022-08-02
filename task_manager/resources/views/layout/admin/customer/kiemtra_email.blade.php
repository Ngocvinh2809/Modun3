<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kiểm Tra Email</title>
</head>
<body>
    <div class="main-content">
        <h1>Ứng dụng kiểm tra email hợp lệ</h1>
        <form method="post" action="{{ route('checkEmail')}}">
            @csrf
            <label for="email-input">Email:</label>
            <input id="email-input" type="email" placeholder="Nhập email cần kiểm tra" name="email">
            <input type="submit" value="Check">
        </form>
        @if(isset($isEmail))
            Kết quả: {{ $isEmail ? 'Đúng định dạng Email':'Sai định dạng Email' }}
        @endif
    </div>
</body>
</html>