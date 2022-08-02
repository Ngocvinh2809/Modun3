<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>products</title>
</head>
<body>
<h1>Đăng nhập</h1>
<form action="/products" method="POST">
    @csrf
    Mô tả của sản phẩm
    <p>
        <input type="text" name="mota" placeholder="Product Description">
    </p>
    Giá niêm yết của sản phẩm
    <p>
        <input type="text" name="gia" placeholder="List Price">
    </p>
    Tỷ lệ chiết khấu (phần trăm)
    <p>
        <input type="text" name="tile" placeholder="Discount Percent">
    </p>
    <p>
        <button type="submit">Calculate Discount</button>
    </p>
</form>
</body>
</html>