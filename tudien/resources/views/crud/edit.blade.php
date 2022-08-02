<form action="/update" method="post">
    @csrf
    @method('PUT')
      <input type="text" name="vn"  placeholder="Nhập từ cần tìm"/>
      <input type = "submit" id = "submit" value = "Tìm"/>
   </form>