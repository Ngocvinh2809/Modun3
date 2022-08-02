<form action="/destroy" method="post">
    @csrf
    @method('delete')
      {{-- <input type="text" name="vn"  placeholder="Nhập từ cần tìm"/> --}}
      <input type = "submit" name="vn" id = "submit" value = "xoa"/>
   </form>