<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <title>AdminLTE 3 | Dashboard 2</title>
    <link rel="stylesheet" href="{{asset('order/order.css')}}">
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

<body class="bg-light">
    <header class="mb-3">
        <nav class="navbar navbar-expand-lg  navbar navbar-white navbar-light  shadow-sm">
            <div class="container">
                <a class="navbar-brand">Brand</a>

                <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="my-nav" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        <a class="nav-link text-warning" href=" {{route('danhsachNV')}}"> <i class="fas fa-table text-warning"></i>  Trang quản lý</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link text-primary" href=" {{route('Thongkedoanhthu')}}"> <i class="fas fa-chart-line text-primary"></i>  Trang thống kê</a>
                        </li>
                    </ul>

                </div>
                <img class="img-bordered mr-2 rounded-circle img-bordered-sm img-thumbnail img-fluid"
                    src="{{asset('image/smart-cart.png')}}" alt="user image">
                <span class="mr-2">Xin chào, Admin!</span>
                <span data-toggle="tooltip" data-placement="left" title="Đăng xuất"><i
                        class="fas fa-arrow-right"></i></span>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row">
            <h3>Xử lý đơn hàng</h3>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @foreach ($bilInforShipping as $item)
                        <h2>#{{$item->BILL_NO}}</h2>
                        <h6>{{date('d-m-Y', strtotime($item->BILL_DATE))}}</h6>
                        @endforeach


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">

                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin cá nhân</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-remove"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            @foreach ($bilInforShipping as $item)
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mã khách hàng:</label>
                                            <p>{{$item->CUSTOMER_NO}}</p>

                                        </div>
                                        <div class="form-group">
                                            <label>Tên khách hàng:</label>
                                            <p>{{$item->CUSTOMER_NAME}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <p>{{$item->CUSTOMER_EMAIL}}</p>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Địa chỉ:</label>
                                            <p>{{$item->CUSTOMER_ADD}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại:</label>
                                            <p>{{$item->CUSTOMER_PHONE}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ nhận hàng:</label>
                                            <p>{{$item->BILL_DELIVERYADDRESS}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Chi chú:</label>
                                            <p>{{$item->BILL_NOTE}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            @endforeach
                        </div>
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Chi tiết hóa đơn</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-remove"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Tên món ăn</th>
                                                    <th scope="col">Đơn vị</th>
                                                    <th scope="col">Số lượng</th>
                                                    <th scope="col">Đơn giá</th>
                                                    <th scope="col">Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $total=null;
                                                $no=1;
                                                @endphp
                                                @foreach ($billdetailShipping as $item )
                                                @php
                                                $intoMoney=$item->BILLDETAIL_AMOUNT * $item->BILLDETAIL_PRICE;
                                                $total+=$intoMoney;
                                                @endphp
                                                <tr>
                                                    <th scope="row">{{$no++}}</th>
                                                    <td>{{$item->FOOD_NAME}}</td>
                                                    <td>{{$item->FOOD_UNIT}}</td>
                                                    <td>{{$item->BILLDETAIL_AMOUNT}}</td>
                                                    <td>{{number_format($item->BILLDETAIL_PRICE,0,',','.')}} đ</td>
                                                    <td>{{number_format($intoMoney,0,',','.')}} đ</td>
                                                </tr>
                                                @endforeach

                                                @foreach ($bilInforShipping as $item )
                                                <span class="text-danger mr-2">Tổng tiền hàng:
                                                    {{number_format($item->BILL_TOTAL,0,',','.')}}
                                                    đ</span>
                                                <span class="text-danger mr-2">Khuyến mãi:
                                                    {{number_format($item->BILL_PROMOTION,0,',','.')}}
                                                    đ</span>
                                                <span class="text-danger mr-2">Tổng hóa đơn:
                                                    {{number_format($item->BILL_TOTAL -$item->BILL_PROMOTION,0,',','.')}}
                                                    đ</span>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
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
