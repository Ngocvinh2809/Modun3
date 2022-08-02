<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Dashboard | Simple - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets\images\favicon.ico">
        <!-- App css -->
        <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">
    </head>
    <body>
        <div id="wrapper">
        @include('admin.header')
        @include('admin.sidebar')
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <h4 class="header-title mb-3">Welcome !</h4>
                                    
                                </div>
                               
                            </div>
                        </div> 
                    @yield('content')
                    </div>
        @include('admin.footer')
                </div>
            </div>
        </div>
        <!-- Vendor js -->
        <script src="assets\js\vendor.min.js"></script>

        <script src="assets\libs\morris-js\morris.min.js"></script>
        <script src="assets\libs\raphael\raphael.min.js"></script>

        <script src="assets\js\pages\dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets\js\app.min.js"></script>
    </body>
</html>