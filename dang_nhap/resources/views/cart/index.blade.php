{{-- {{dd(session()->in validate());}} --}}
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="asset/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="asset/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="asset/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                    </div>
                </div>
                <div class="ht-right">
                    <a href="#" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="asset/img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">English</option>
                            <option value='yu' data-image="asset/img/flag-2.jpg" data-imagecss="flag yu"
                                data-title="Bangladesh">German </option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="#">
                                <img src="asset/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <form action="#" class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            {{-- <li class="heart-icon"><a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li> --}}
                            <li class="cart-icon"><a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span>{{ count((array) session('cart')) }}</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                @php $total = 0 @endphp
                                                @foreach ((array) session('cart') as $id => $details)
                                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                                @endforeach
                                                @if (session('cart'))
                                                    @foreach (session('cart') as $id => $details)
                                                        <tr>
                                                            <td class="si-pic"><img
                                                                    src="asset/img/cart-page/{{ $details['img'] }}"
                                                                    alt="Ảnh bị lỗi">
                                                            </td>
                                                            <td class="si-text">
                                                                <div class="product-selected">
                                                                    <p>{{ $details['price'] }} x
                                                                        {{ $details['quantity'] }}</p>
                                                                    <h6>{{ $details['name'] }}</h6>
                                                                </div>
                                                            </td>
                                                            <td class="si-close">
                                                                <i class="ti-close"></i>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>{{ number_format($total) }}đ</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="{{ route('cart.list') }}" class="primary-btn view-card">VIEW CARD</a>
                                        {{-- <a href="{{route('cart.index')}}" class="primary-btn checkout-btn">CHECK OUT</a> --}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>

                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="{{ route('product.index') }}">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Collection</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Pages</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{ route('cart.list') }}"><i class="fa fa-home"></i> Trang Chủ</a>
                        <a href="{{ route('cart.list') }}">Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="product-list">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="public/uploads/login/{{ $product->image }}" alt="ảnh bị lỗi"
                                                style="with:130px; height:300px">
                                            <div class="sale pp-sale">Sale</div>
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i
                                                            class="icon_bag_alt"></i></a></li>
                                                <li class="quick-view"><a
                                                        href="{{ route('addToCart', $product->id) }}"
                                                        id="addCart">+ Add Cart</a>
                                                    {{-- <script>alertifi.success('Thêm Thành Công')</script> --}}
                                                </li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            {{-- <div class="catagory-name">Towel</div> --}}
                                            <a href="#">
                                                <h5>{{ $product->name }}</h5>
                                            </a>
                                            <div class="product-price">
                                                {{ number_format($product->price) }}đ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Partner Logo Section Begin -->
    <footer class="footer-section">
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i
                                class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="asset/img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->

    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="asset/js/jquery-3.3.1.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/jquery-ui.min.js"></script>
    <script src="asset/js/jquery.countdown.min.js"></script>
    <script src="asset/js/jquery.nice-select.min.js"></script>
    <script src="asset/js/jquery.zoom.min.js"></script>
    <script src="asset/js/jquery.dd.min.js"></script>
    <script src="asset/js/jquery.slicknav.js"></script>
    <script src="asset/js/owl.carousel.min.js"></script>
    <script src="asset/js/main.js"></script>
    @section('scripts')
        <script>
            jQuery(document).ready(function() {

            });
        </script>
    @endsection
</body>

</html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
