<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <head>
        <title>Từ Điển</title>
        <style> 
        input[type=text] {
            width: 300px;
            font-size: 16px;
            border: 2px solid #ccc; 
            border-radius: 4px;
            padding: 12px 10px 12px 10px;
        }
        #submit {
            border-radius: 2px;
            padding: 10px 32px;
            font-size: 16px;
        }
        </style>
    </head>
    <body>
       <h1>Từ Điển Anh - Việt</h1>
       <form action="/tudien" method="post">
        @csrf
          <input type="text" name="vn"  placeholder="Nhập từ cần tìm"/>
          <input type = "submit" id = "submit" value = "Tìm"/>
       </form>
    </body>
    </html>