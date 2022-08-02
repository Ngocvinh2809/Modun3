<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Máy Tính</title>
</head>
<body>
    <form action="{{route('tinh')}}" method="post">
        @csrf
        <label for="fname">Số Thứ Nhất</label>
        <input type="text" name="so1">
        <br>
        <br>
        <label for="">Phép Tính</label>
        <select name="tinh" id="">
            <option value="+">Cộng</option>
            <option value="-">Trừ</option>
            <option value="*">Nhân</option>
            <option value="/">Chia</option>
        </select>
        <br>
        <br>
        <label for="fname">Số Thứ Hai</label>
        <input type="text" name="so2">
        <br>
        <br>
        <input type="submit" value="Tính" class="btn btn-primary">
    </form>
</body>
</html>