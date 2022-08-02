
<!DOCTYPE html>
<title>Đăng Nhập</title>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap');

    * {
      box-sizing: border-box
    }

    body {
      font-family: 'Noto Sans JP', sans-serif;
    }

    h1,
    label {
      color: DodgerBlue;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;
      width: 100%;
      resize: vertical;
      padding: 15px;
      border-radius: 15px;
      border: 0;
      box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);
    }

    input[type=text]:focus,
    input[type=password]:focus {
      outline: none;
    }

    hr {
      border: 1px solid #f1f1f1;
      margin-bottom: 25px;
    }

    /* Set a style for all buttons */
    button {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }

    button:hover {
      opacity: 1;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
      padding: 14px 20px;
      background-color: #f44336;
    }

    /* Float cancel and signup buttons and add an equal width */
    .signupbtn {
      float: left;
      width: 100%;
      border-radius: 15px;
      border: 0;
      box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);
    }

    /* Add padding to container elements */
    .container {
      padding: 16px;
    }

    /* Clear floats */
    .clearfix::after {
      content: "";
      clear: both;
      display: table;
    }
  </style>
  <link rel="stylesheet" href="css/simplebar.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- Fonts CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Icons CSS -->
</head>
<body style="background-color: #64dc4c85;">
  <div class="container" >
    <div class="row">
      <div class="col-4"></div>
      <div class="col-8">
        <form action="{{route('login')}}" method="post" style="width:500px">
          <h1>Đăng Nhập</h1>
          <hr>
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Nhập Email" name="email" required>
          <label for="psw"><b>Mật Khẩu</b></label>
          <input type="password" placeholder="Nhập Mật Khẩu" name="password" required>
          <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Nhớ Đăng Nhập
          </label>
          <div class="clearfix">
            <button type="submit" class="btn btn-primary">Đăng Nhập</button>
          </div>
          <br />
          <div class="clearfix">
            Bạn chưa có tài khoản ? Vui lòng ấn
            <a href="http://127.0.0.1:8000/register" class="btn btn-danger">Đăng Ký</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

