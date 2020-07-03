<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <title>AdminLTE 3 | Dashboard 2</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset("admin/plugins/fontawesome-free/css/all.min.css")}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset("admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("admin/dist/css/adminlte.min.css")}}">
    <link rel="stylesheet" href="{{asset('admin/css/admin.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">


    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.15.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.15.1/firebase-storage.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.15.1/firebase-analytics.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body class="hold-transition bg-img sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <section class="content">
            <div class="container ">
                <div class="row mt-5 mb-2">
                    <div class="col-4">

                    </div>
                    <div class="col-4">
                        <img src="https://photocross.net/wp-content/uploads/2020/03/bo-cuc-chup-anh-chan-dung.jpg" height="150" width="150" class=" rounded-circle  mx-auto d-block" alt="...">
                    </div>
                    <div class="col-4">

                    </div>
                </div>
                <div class="row">
                    <div class="col-4">

                    </div>
                    <div class="col-4 text-center">
                        <h2>Xin chào! Nguyễn Văn Hiệp</h2>

                    </div>
                    <div class="col-4">

                    </div>
                </div>
                <div class="row mt-5">

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>Đơn Hàng</h3>

                                <p>Duyệt đơn, thanh toán...</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <a href="{{route('quanlydonhang')}}" class="small-box-footer">Đi tới <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-primary">
                            <div class="inner">
                                <h3>Quản Lý</h3>

                                <p>Đơn hàng, Nguyên liệu, Thực đơn,...</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-tasks"></i>
                            </div>
                        <a href="{{route('DSNguyenLieu')}}" class="small-box-footer">Đi tới <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>Thống Kê</h3>

                                <p>Hóa đơn, Doanh thu</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                        <a href="{{route('Thongkedoanhthu')}}" class="small-box-footer">Đi tới <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>Thiết đặt</h3>

                                <p>Giao diện, Tài nguyên</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <a href="#" class="small-box-footer">Đi tới <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <div class="row">
                    <div class="col-4">

                    </div>
                    <div class="col-4 text-center">
                        <p>Hotline 19001900 &copy; 2019-2020
                        </p>
                    <a href="{{route('dang-xuat-admin')}}" ><span class="text-white">Đăng xuất ?</span></a>
                    </div>
                    <div class="col-4">

                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{asset("admin/plugins/jquery/jquery.min.js")}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset("admin/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset("admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset("admin/dist/js/adminlte.js")}}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{asset("admin/dist/js/demo.js")}}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{asset('admin/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('admin/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
    <!-- ChartJS -->

    <!-- PAGE SCRIPTS -->
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script src="{{asset('admin/plugins/dist/js/pages/dashboard2.js')}}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script>
        $('div.alert').not('.alert-important').delay(4000).fadeOut(350);
    </script>

</body>

</html>
