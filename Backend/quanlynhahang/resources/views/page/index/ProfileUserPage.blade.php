<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Caviar - Premium Restaurant Template</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('index/img/core-img/favicon.ico')}}">

    <!-- Core Stylesheet -->
    <link href="{{asset('index/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("admin/plugins/fontawesome-free/css/all.min.css")}}">
    <!-- Responsive CSS -->
    <link href="{{asset('index/css/responsive/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="caviar-load"></div>
        <div class="preload-icons">
            <img class="preload-1" src="{{asset('index/img/core-img/preload-1.png')}}" alt="">
            <img class="preload-2" src="{{asset('index/img/core-img/preload-2.png')}}}" alt="">
            <img class="preload-3" src="{{asset('index/img/core-img/preload-3.png')}}" alt="">
        </div>
    </div>

    <!-- ***** Search Form Area ***** -->
    <div class="caviar-search-form d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-close-btn" id="closeBtn">
                        <i class="pe-7s-close-circle" aria-hidden="true"></i>
                    </div>
                    <form action="#" method="get">
                        <input type="search" name="caviarSearch" id="search"
                            placeholder="Search Your Favourite Dish ...">
                        <input type="submit" class="d-none" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="h-100 navbar navbar-expand-lg align-items-center">
                        <a class="navbar-brand" href="index.html">caviar</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#caviarNav"
                            aria-controls="caviarNav" aria-expanded="false" aria-label="Toggle navigation"><span
                                class="fa fa-bars"></span></button>
                        <div class="collapse navbar-collapse" id="caviarNav">
                            <ul class="navbar-nav ml-auto" id="caviarMenu">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="index.html">Home</a>
                                        <a class="dropdown-item" href="menu.html">Menu</a>
                                        <a class="dropdown-item" href="regular-page.html">Regular Page</a>
                                        <a class="dropdown-item" href="contact.html">Contact</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#menu">Menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#awards">Awards</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#testimonial">Testimonials</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#reservation">Reservation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                            <!-- Search Btn -->
                            <div class="caviar-search-btn">
                                <a id="search-btn" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Breadcumb Area Start ***** -->
    <div class="breadcumb-area bg-img bg-overlay"
        style="background-image: url({{asset('index/img/bg-img/hero-5.jpg')}})">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h2>Menu</h2>
                        <a href="#menu" id="menubtn" class="btn caviar-btn"><span></span> Special</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Regular Page Area Start ***** -->
    <section class="caviar-regular-page section-padding-100">
        <div class="container">
            <div class="post-title mr-2">
                <h2>Trang cá nhân</h2>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            @foreach ($customer as $item)

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center ">
                                        <img class="profile-user-img img-fluid rounded-circle"
                                            src="{{asset('admin/dist/img/user4-128x128.jpg')}}"
                                            alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">{{$item->CUSTOMER_NAME}}</h3>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Điểm tích lũy</b> <a class="float-right">{{$item->CUSTOMER_MARK}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            @foreach ($purchase as $item_purchase)
                                        <b>Số đơn hàng</b> <a class="float-right">{{$item_purchase->COUNT_BILL_SUCCESS}}</a>
                                            @endforeach
                                        </li>

                                    </ul>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                            <div class="card card-primary mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">Thông tin</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ</strong>

                                <p class="text-muted">{{$item->CUSTOMER_ADD}}</p>

                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Số điện thoại</strong>

                                    <p class="text-muted">
                                    <span class="tag tag-danger">{{$item->CUSTOMER_PHONE}}</span>

                                    </p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Email</strong>

                                    <p class="text-muted">{{$item->CUSTOMER_EMAIL}}</p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            @endforeach
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#activity"
                                                data-toggle="tab">Đơn hàng chờ xử lý</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Đơn
                                                hàng đang xử lý</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Đơn
                                                hàng đang vận chuyển</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#all" data-toggle="tab">Đơn hàng
                                                hoàn thành</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">
                                            <div class="col-md-12">
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
                                                                    <span class="badge badge-warning">Đang chờ xử
                                                                        lý</span>
                                                                    @endif

                                                                </td>

                                                                <td><span>{{number_format($item->BILL_TOTAL,0,',','.')}}
                                                                        đ</span></td>
                                                                <td>
                                                                    <div class="sparkbar" data-color="#00a65a"
                                                                        data-height="20">
                                                                        @if ($item->BILL_PAID==1)
                                                                        <span class="badge badge-success">Đã thanh
                                                                            toán</span>

                                                                        @else
                                                                        <span class="badge badge-warning">Thanh toán
                                                                            sau</span>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="{{route('trangcanhan/chitiethoadon',['bill_no'=>$item->BILL_NO])}}"
                                                                        class="btn btn-sm btn-info">
                                                                        Chi tiết
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="float-right">
                                                    {{$billWaitting->appends(['billWaitting' => $billWaitting->currentPage(), 'billProcessing' => $billProcessing->currentPage(),'billShipping' => $billShipping->currentPage(),'billShipping' => $billSucces->currentPage()])->links()}}

                                                </div>

                                                <!-- /.card -->
                                            </div>

                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="settings">
                                            <div class="col-md-12">
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
                                                                    <span class="badge badge-success">Đang giao
                                                                        hàng</span>
                                                                    @endif

                                                                </td>

                                                                <td><span>{{number_format($item->BILL_TOTAL,0,',','.')}}
                                                                        đ</span></td>
                                                                <td>
                                                                    <div class="sparkbar" data-color="#00a65a"
                                                                        data-height="20">
                                                                        @if ($item->BILL_PAID==1)
                                                                        <span class="badge badge-success">Đã thanh
                                                                            toán</span>

                                                                        @else
                                                                        <span class="badge badge-warning">Thanh toán
                                                                            sau</span>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-info"
                                                                        href="{{route('trangcanhan/chitiethoadon',['bill_no'=>$item->BILL_NO])}}">
                                                                        Chi tiết
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="float-right">
                                                    {{$billShipping->appends(['billWaitting' => $billWaitting->currentPage(), 'billProcessing' => $billProcessing->currentPage(),'billShipping' => $billShipping->currentPage()])->links()}}

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->


                                        <div class="tab-pane" id="timeline">
                                            <div class="col-md-12">

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

                                                                <td><span>{{number_format($item->BILL_TOTAL,0,',','.')}}
                                                                        đ</span></td>
                                                                <td>
                                                                    <div class="sparkbar" data-color="#00a65a"
                                                                        data-height="20">
                                                                        @if ($item->BILL_PAID==1)
                                                                        <span class="badge badge-success">Đã thanh
                                                                            toán</span>

                                                                        @else
                                                                        <span class="badge badge-warning">Thanh toán
                                                                            sau</span>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-info"
                                                                        href="{{route('trangcanhan/chitiethoadon',['bill_no'=>$item->BILL_NO])}}">
                                                                        Chi tiết
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="float-right">
                                                    {{$billProcessing->appends(['billWaitting' => $billWaitting->currentPage(), 'billProcessing' => $billProcessing->currentPage(),'billShipping' => $billShipping->currentPage(),'billShipping' => $billSucces->currentPage()])->links()}}

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="all">
                                            <div class="col-md-12">
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
                                                            @foreach ($billSucces as $item)
                                                            <tr>
                                                                <td class="text-primary">{{$item->BILL_NO}}</td>
                                                                <td>{{$item->CUSTOMER_PHONE}}</td>
                                                                <td>
                                                                    @if ($item->BILL_STATUS==1)
                                                                    <span class="badge badge-info">Đang xử lý</span>
                                                                    @endif

                                                                </td>

                                                                <td><span>{{number_format($item->BILL_TOTAL,0,',','.')}}
                                                                        đ</span></td>
                                                                <td>
                                                                    <div class="sparkbar" data-color="#00a65a"
                                                                        data-height="20">
                                                                        @if ($item->BILL_PAID==1)
                                                                        <span class="badge badge-success">Đã thanh
                                                                            toán</span>

                                                                        @else
                                                                        <span class="badge badge-warning">Thanh toán
                                                                            sau</span>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-info"
                                                                        href="{{route('trangcanhan/chitiethoadon',['bill_no'=>$item->BILL_NO])}}">
                                                                        Chi tiết
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="float-right">
                                                    {{$billSucces->appends(['billWaitting' => $billWaitting->currentPage(), 'billProcessing' => $billProcessing->currentPage(),'billShipping' => $billShipping->currentPage(),'billShipping' => $billSucces->currentPage()])->links()}}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->

                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
        </div>
    </section>
    <!-- ***** Regular Page Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    <footer class="caviar-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-text">
                        <a href="#" class="navbar-brand">caviar</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- jQuery-2.2.4 js -->
    <script src="{{asset('index/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('index/js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('index/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{asset('index/js/others/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('index/js/active.js')}}"></script>
</body>
