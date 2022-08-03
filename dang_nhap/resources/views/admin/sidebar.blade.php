<div class="left-side-menu">
    <div class="user-box">
            <div class="float-left">
                <img src="{{asset('assets\images\users\avatar-3.jpg')}}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="user-info">
                <a href="#">Stanley Jones</a>
                <p class="text-muted m-0">Quản Lý</p>
            </div>
        </div>
<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        {{-- <li class="menu-title">Navigation</li> --}}

        <li>
            <a href="#">
                <i class="ti-home"></i>
                <span> Trang Chủ </span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="ti-light-bulb"></i>
                <span> Thành Phần </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{route('staff.list')}}">Nhân Viên</a></li>
                <li><a href="{{route('customer.index')}}">Khách Hàng</a></li>
                {{-- <li><a href="components-icons.html">Icons</a></li>
                <li><a href="components-widgets.html">Widgets</a></li> --}}
            </ul>
        </li>


        <li>
            <a href="javascript: void(0);">
                <i class="ti-pencil-alt"></i>
                <span>  Danh Mục  </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{route('cart.index')}}">Cửa Hàng</a></li>
                <li><a href="{{route('product.index')}}">Sản Phẩm</a></li>
            </ul>
        </li>

        <li>
            <a href="#">
                <i class="bi bi-caret-right-square"></i>
                <span> Kiểu </span>
            </a>
        </li>
        
    </ul>

</div>
<!-- End Sidebar -->
<div class="clearfix"></div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">