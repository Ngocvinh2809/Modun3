<form action="/create" method="post">
    @csrf
    {{-- @method() --}}
      <input type="text" name="vn"  placeholder="Nhập từ cần tìm"/>
      <input type = "submit" id = "submit" value = "Tìm"/>
   </form>