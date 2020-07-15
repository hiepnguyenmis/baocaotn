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

<body class="bg-light bg-img">
    <header class="mb-3">
        <nav class="navbar navbar-expand-lg  navbar navbar-white navbar-light  shadow-sm">
            <div class="container">
                <a class="navbar-brand">Caviar</a>

                <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="my-nav" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link text-primary" href=" {{route('/')}}"> <i <i
                                    class="fas fa-home text-primary"></i> Trang chủ</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link text-warning" href=" {{route('danhsachNV')}}"> <i
                                    class="fas fa-table text-warning"></i> Trang quản lý</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link text-success" href=" {{route('Thongkedoanhthu')}}"> <i
                                    class="fas fa-chart-line text-success"></i> Trang thống kê</a>
                        </li>
                    </ul>

                </div>

                <img class="img-bordered mr-2 rounded-circle img-bordered-sm img-thumbnail img-fluid"
                    src="{{Session::get('employee_image')}}" alt="user image">
                <span class="mr-2">Xin chào, {{Session::get('employee_lastname')}}
                    {{Session::get('employee_firstname')}}!</span>
                <a href="{{route('dang-xuat-admin')}}" data-toggle="tooltip" data-placement="top"
                    title="Đăng xuất"><span data-toggle="tooltip" data-placement="left" title="Đăng xuất"><i
                            class="fas fa-arrow-right"></i></span></a>
            </div>
        </nav>
        <section class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-white">Quản Lý Đơn Hàng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('/')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active text-white">Quản lý đơn hàng</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </header>
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Đơn hàng đang chờ</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Mã đơn</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng đơn</th>
                                        <th>Thanh toán</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($billWaitting as $item)
                                    <tr>
                                        <td class="text-primary">{{$item->BILL_NO}}</td>
                                        <td>{{$item->CUSTOMER_PHONE}}</td>
                                        <td>
                                            @if ($item->BILL_STATUS==2)
                                            <span class="badge badge-warning">Đang chờ xử lý</span>
                                            @endif

                                        </td>

                                        <td><span>{{number_format($item->BILL_TOTAL,0,',','.')}} đ</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                @if ($item->BILL_PAID==1)
                                                <span class="badge badge-success">Đã thanh toán</span>

                                                @else
                                                <span class="badge badge-warning">Thanh toán sau</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{route('Chitietdondangcho',['bill_no'=>$item->BILL_NO])}}"
                                                        class="btn btn-sm btn-info">
                                                        Chi tiết
                                                    </a>
                                                </div>
                                                <div class="col-6">
                                                    <form
                                                        action="{{route('xoadonhangcho',['bill_id'=>$item->BILL_ID])}}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-warning">
                                                            Hủy
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix float-right">
                        <div class="float-right">
                            {{$billWaitting->appends(['billWaitting' => $billWaitting->currentPage(), 'billProcessing' => $billProcessing->currentPage(),'billShipping' => $billShipping->currentPage()])->links()}}

                        </div>

                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            @if (Session::has('statusBillProcessEditSuccess'))
            <div class="alert alert-success alert-dismissible mt-2" role="alert">
                <i class="fas fa-check-circle"></i>
                <strong>{{ Session::get('statusBillProcessEditSuccess') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (Session::has('statusBillProcessEditError'))
            <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                <i class="fas fa-exclamation-circle"></i>
                <strong>{{ Session::get('statusBillProcessEditError') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-transparent">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-2">
                                    <h3 class="card-title">Đơn hàng đang xử lý</h3>
                                </div>
                                <div class="col-8 ">
                                    <form action="Timkiemdondangxuly" method="GET" class="form-inline float-left">
                                        <input class="form-control mr-sm-2" name='Search-Order-Processing' type="search"
                                            placeholder="Tìm kiếm" aria-label="Search">
                                    </form>
                                </div>
                                <div class="col-2 ">
                                    <div class="card-tools float-right">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Mã đơn</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng đơn</th>
                                        <th>Thanh toán</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($billProcessing as $item)
                                    <tr>
                                        <td class="text-primary">{{$item->BILL_NO}}</td>
                                        <td>{{$item->CUSTOMER_PHONE}}</td>
                                        <td>
                                            @if ($item->BILL_STATUS==3)
                                            <span class="badge badge-info">Đang xử lý</span>
                                            @endif

                                        </td>

                                        <td><span>{{number_format($item->BILL_TOTAL,0,',','.')}} đ</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                @if ($item->BILL_PAID==1)
                                                <span class="badge badge-success">Đã thanh toán</span>

                                                @else
                                                <span class="badge badge-warning">Thanh toán sau</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info"
                                                href="{{route('chitietdondangxuly',['bill_no'=>$item->BILL_NO])}}">
                                                Chi tiết
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix float-right">
                        <div class="float-right">
                            {{$billProcessing->appends(['billWaitting' => $billWaitting->currentPage(), 'billProcessing' => $billProcessing->currentPage(),'billShipping' => $billShipping->currentPage()])->links()}}
                        </div>
                    </div>
                    <div>
                        @if ($errors->has('Search-Order-Processing'))
                        <div style="color: red">
                            <div class="alert alert-primary" role="alert">
                                {{ $errors->first('Search-Order-Processing') }}
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            @if (Session::has('statusBillConfirmEditSuccess'))
            <div class="alert alert-success alert-dismissible mt-2" role="alert">
                <i class="fas fa-check-circle"></i>
                <strong>{{ Session::get('statusBillConfirmEditSuccess') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (Session::has('statusBillConfirmEditError'))
            <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                <i class="fas fa-exclamation-circle"></i>
                <strong>{{ Session::get('statusBillConfirmEditError') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-transparent">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-2">
                                    <h3 class="card-title">Đơn hàng đang giao</h3>
                                </div>
                                <div class="col-8 ">
                                    <form action="Timkiemdondanggiao" method="GET" class="form-inline float-left">
                                        <input class="form-control mr-sm-2" name='Search-Order-Shipping' type="search"
                                            placeholder="Tìm kiếm" aria-label="Search">
                                    </form>
                                </div>
                                <div class="col-2 ">
                                    <div class="card-tools float-right">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Mã đơn</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng đơn</th>
                                        <th>Thanh toán</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($billShipping as $item)
                                    <tr>
                                        <td class="text-primary">{{$item->BILL_NO}}</td>
                                        <td>{{$item->CUSTOMER_PHONE}}</td>
                                        <td>
                                            @if ($item->BILL_STATUS==4)
                                            <span class="badge badge-success">Đang giao hàng</span>
                                            @endif

                                        </td>

                                        <td><span>{{number_format($item->BILL_TOTAL,0,',','.')}} đ</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                @if ($item->BILL_PAID==1)
                                                <span class="badge badge-success">Đã thanh toán</span>

                                                @else
                                                <span class="badge badge-warning">Thanh toán sau</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info"
                                                href="{{route('Chitietdondangvanchuyen',['bill_no'=>$item->BILL_NO])}}">
                                                Chi tiết
                                            </a>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix float-right">
                        <div class="float-right">
                            {{$billShipping->appends(['billWaitting' => $billWaitting->currentPage(), 'billProcessing' => $billProcessing->currentPage(),'billShipping' => $billShipping->currentPage()])->links()}}

                        </div>
                    </div>
                    <div>
                        @if ($errors->has('Search-Order-Shipping'))
                        <div style="color: red">
                            <div class="alert alert-primary" role="alert">
                                {{ $errors->first('Search-Order-Shipping') }}
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- /.card-footer -->
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
