@extends('layout.AdminPageLayout')

@section('master-admin')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Trang Thống Kê</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Trang thống kê </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-hamburger"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng số món ăn</span>
                        @foreach ($countFoods as $item)
                        <span class="info-box-number">
                            {{$item->countAllFood}}
                        </span>
                        @endforeach
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-friends"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tổng số nhân viên</span>
                        @foreach ($countEmployees as $item)
                        <span class="info-box-number">{{$item->countAllEmployees}}</span>
                        @endforeach
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tổng số đơn hàng</span>
                        @foreach ($countbill as $item)
                        <span class="info-box-number">{{$item->countAllBill}}</span>
                        @endforeach

                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tổng số khách hàng</span>
                        @foreach ($countCustomer as $item)
                        <span class="info-box-number">{{$item->countAllCustomer}}</span>
                        @endforeach
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Thống kê theo năm</h5>

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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-11">
                                <div class="dropdown show">
                                    <span>Năm: </span>
                                    <a class="btn dropdown-toggle dropdown-statatics" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        2020
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                        @foreach ($billArrayUnique as $item)
                                        <a class="dropdown-item year-statistics bill-statistics">{{$item}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <p class="text-center">
                                    <strong id="approx-time"></strong>
                                </p>
                                <!-- Example split danger button -->

                                <div class="chart">

                                    <!-- Sales Chart Canvas -->
                                    <canvas id="salesChart" height="140" style="height: 140px;"></canvas>
                                </div>
                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->

                            <!-- /.row -->
                        </div>
                        <!-- ./card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 col-6">
                                    <div class="description-block border-right">

                                        <h5 class="description-header revenueYear"></h5>
                                        <span class="description-text">TỔNG DOANH THU</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 col-6">
                                    <div class="description-block border-right">

                                        <h5 class="description-header costYear"></h5>
                                        <span class="description-text">TỔNG CHI PHÍ</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <!-- /.col -->
                                <div class="col-sm-4 col-6">
                                    <div class="description-block">

                                        <h5 class="description-header profitYear"></h5>
                                        <span class="description-text">TỔNG LỢI NHUẬN</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Main row -->
            <div class="col-md-12">
                <!-- MAP & BOX PANE -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thống kê theo tháng</h3>

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
                        <div class="d-md-flex">
                            <div class="p-1 flex-fill" style="overflow: hidden">
                                <div class="row">
                                    <div class="dropdown show ml-3 col-lg-2">
                                        <span>Năm: </span>
                                        <a class="btn dropdown-toggle dropdown-statatics-year" href="#" role="button"
                                            id="dropdownYearLink" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">

                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownYearLink">

                                            @foreach ($billArrayUnique as $item)
                                            <a class="dropdown-item year-statistics bill-year-statistics">{{$item}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="dropdown show col-lg-2">
                                        <span>Tháng: </span>
                                        <a class="btn dropdown-toggle dropdown-statatics-month" href="#" role="button"
                                            id="dropdownMonthLink" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            2020
                                        </a>

                                        <div class="dropdown-menu" id='dropdown-statatics-month'
                                            aria-labelledby="dropdownMonthLink">

                                        </div>
                                    </div>
                                </div>
                                <!-- Map will be created here -->

                                <div id="world-map-markers" style="height: 455px; overflow: hidden">
                                    <p class="text-center">
                                        <strong id="approx-month-time"></strong>
                                    </p>
                                    <canvas id="salesChartMonth" height="140" width="300" style="height: 140px;"></canvas>
                                </div>
                            </div>
                            <div class="card-pane-right bg-success pt-1 pb-2 pl-4 pr-4">
                                <div class="description-block mb-4">
                                    <h5 class="description-header revelarMonth"></h5>
                                    <span class="description-text">TỔNG DOANH THU</span>
                                </div>
                                <!-- /.description-block -->
                                <div class="description-block mb-4">
                                    <h5 class="description-header costMonth"></h5>
                                    <span class="description-text">TỔNG CHI PHÍ</span>
                                </div>
                                <!-- /.description-block -->
                                <div class="description-block">
                                    <h5 class="description-header profitMonth"></h5>
                                    <span class="description-text">TỔNG LỢI NHUẬN</span>
                                </div>
                                <!-- /.description-block -->
                            </div><!-- /.card-pane-right -->
                        </div><!-- /.d-md-flex -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- /.row -->

                <!-- TABLE: LATEST ORDERS -->
                {{-- <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Orders</h3>

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
                                        <th>Order ID</th>
                                        <th>Item</th>
                                        <th>Status</th>
                                        <th>Popularity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                        <td>Call of Duty IV</td>
                                        <td><span class="badge badge-success">Shipped</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                90,80,90,-70,61,-83,63</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f39c12" data-height="20">
                                                90,80,-90,70,61,-83,68</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                        <td>iPhone 6 Plus</td>
                                        <td><span class="badge badge-danger">Delivered</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f56954" data-height="20">
                                                90,-80,90,70,-61,83,63</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="badge badge-info">Processing</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00c0ef" data-height="20">
                                                90,80,-90,70,-61,83,63</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f39c12" data-height="20">
                                                90,80,-90,70,61,-83,68</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                        <td>iPhone 6 Plus</td>
                                        <td><span class="badge badge-danger">Delivered</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f56954" data-height="20">
                                                90,-80,90,70,-61,83,63</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                        <td>Call of Duty IV</td>
                                        <td><span class="badge badge-success">Shipped</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                90,80,90,-70,61,-83,63</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All
                            Orders</a>
                    </div>
                    <!-- /.card-footer -->
                </div> --}}
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->

</section>
<script src="{{asset('js/Plugins/Numeral-js/min/numeral.min.js')}}"></script>
<script src="{{asset('js/JQuery/StatisticsBills.js')}}"></script>
@endsection
