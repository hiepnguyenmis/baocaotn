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
        <div class="row">
            <div class="col-md-12">
                <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <div class="row">
                            <div class="col-4">
                                <h3 class="card-title">Thống kê hóa đơn hôm nay</h3>
                            </div>
                            <div class="col-7 ">
                                <div class="float-right">
                                    <form action="Timkiemhoadonhomnay" method="GET" class="form-inline">
                                        <input class="form-control mr-sm-2" name='search' type="search"
                                            placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                            <div class="col-1">
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
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Mã hóa đơn</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng đơn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($billToday as $item)
                                    <tr>
                                        <td><a
                                                href="{{route('Thongtinhoadon',['customers_no'=>$item->CUSTOMER_NO, 'bill_id'=>$item->BILL_ID])}}">{{$item->BILL_NO}}</a>
                                        </td>
                                        <td>{{$item->CUSTOMER_PHONE}}</td>
                                        <td>
                                            @if ($item->BILL_STATUS==1)
                                            <span class="badge badge-danger">Đã thanh toán</span>
                                            @endif
                                            @if ($item->BILL_STATUS==2)
                                            <span class="badge badge-warning">Đang chờ xử lý</span>
                                            @endif
                                            @if ($item->BILL_STATUS==3)
                                            <span class="badge badge-info">Đang xử lý</span>
                                            @endif
                                            @if ($item->BILL_STATUS==4)
                                            <span class="badge badge-success">Đang giao hàng</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                {{number_format($item->BILL_TOTAL,0,',','.')}} vnđ</div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    {{-- {{number_format($totalAllBillToday,2,',','.')}} --}}
                    <div class="card-footer clearfix">
                        <div class="float-left text-success">
                            <table >
                                <tbody>
                                    <tr>
                                        <td>Tổng số hóa đơn hôm nay:</td>
                                        <td class="text-danger">{{$countBillToday}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tổng số hóa đơn hôm qua:</td>
                                        <td class="text-danger">{{$countBillYesterday}} </td>
                                    </tr>
                                    <tr>
                                        <td>Doanh thu hôm nay:</td>
                                        <td class="text-danger">{{number_format($totalAllBillToday,2,',','.')}} vnđ</td>
                                    </tr>
                                    <tr>
                                        <td>Doanh thu hôm qua:</td>
                                        <td class="text-danger">{{number_format($totalAllBillYesterday,2,',','.')}} vnđ</td>
                                    </tr>
                                    <tr>
                                        <td>Tỉ lệ phần trăm chênh lệch:</td>
                                        <td class="text-danger">{{round($percentDate)}} %</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="float-right">
                            {{$billToday->appends(['billToday' => $billToday->currentPage(), 'billThisMonth' => $billThisMonth->currentPage(),'GetAllBill' => $GetAllBill->currentPage()])->links()}}
                        </div>

                    </div>
                    <div>
                        @if ($errors->has('search'))
                        <div style="color: red">
                            <div class="alert alert-primary" role="alert">
                                {{ $errors->first('search') }}
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-12">
                <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <div class="row">
                            <div class="col-4">
                                <h3 class="card-title">Thống kê hóa đơn tháng này</h3>
                            </div>
                            <div class="col-7 ">
                                <div class="float-right">
                                    <form action="Timkiemhoadonthang" method="GET" class="form-inline">
                                        <input class="form-control mr-sm-2" name='searchthismonth' type="search"
                                            placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                            <div class="col-1">
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
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Mã hóa đơn</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng đơn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($billThisMonth as $item)
                                    <tr>
                                        <td><a
                                                href="{{route('Thongtinhoadon',['customers_no'=>$item->CUSTOMER_NO, 'bill_id'=>$item->BILL_ID])}}">{{$item->BILL_NO}}</a>
                                        </td>
                                        <td>{{$item->CUSTOMER_PHONE}}</td>
                                        <td>
                                            @if ($item->BILL_STATUS==1)
                                            <span class="badge badge-danger">Đã thanh toán</span>
                                            @endif
                                            @if ($item->BILL_STATUS==2)
                                            <span class="badge badge-warning">Đang chờ xử lý</span>
                                            @endif
                                            @if ($item->BILL_STATUS==3)
                                            <span class="badge badge-info">Đang xử lý</span>
                                            @endif
                                            @if ($item->BILL_STATUS==4)
                                            <span class="badge badge-success">Đang giao hàng</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                {{number_format($item->BILL_TOTAL,2,',','.')}} vnđ</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                        <div class="float-right">
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <div class="float-left text-success">
                            <table >
                                <tbody>
                                    <tr>
                                        <td>Tổng số hóa đơn tháng này:</td>
                                        <td class="text-danger">{{$countBillThisMonth}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tổng số hóa đơn tháng trước:</td>
                                        <td class="text-danger">{{$countBillLastMonth}} </td>
                                    </tr>
                                    <tr>
                                        <td>Doanh thu tháng này:</td>
                                        <td class="text-danger">{{number_format($totalAllBillThisMonth,2,',','.')}} vnđ</td>
                                    </tr>
                                    <tr>
                                        <td>Doanh thu tháng trước:</td>
                                        <td class="text-danger">{{number_format($totalAllBillLastonth,2,',','.')}} vnđ</td>
                                    </tr>
                                    <tr>
                                        <td>Tỉ lệ phần trăm chênh lệch:</td>
                                        <td class="text-danger">{{round($percentMonth)}} %</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div  class="float-right">
                            {{$billThisMonth->appends(['billToday' => $billToday->currentPage(), 'billThisMonth' => $billThisMonth->currentPage(),'GetAllBill' => $GetAllBill->currentPage()])->links()}}
                        </div>

                    </div>
                    <div>
                        @if ($errors->has('searchthismonth'))
                        <div >
                            <div class="alert alert-primary" role="alert">
                                {{ $errors->first('searchthismonth') }}
                            </div>

                        </div>
                        @endif
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-12">
                <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <div class="row">
                            <div class="col-4">
                                <h3 class="card-title">Tất cả hóa đơn</h3>
                            </div>
                            <div class="col-7 ">
                                <div class="float-right">
                                    <form action="Timkiemhoadon" method="GET" class="form-inline">
                                        <input class="form-control mr-sm-2" name='Search-All-Bill' type="search"
                                            placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                            <div class="col-1">
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
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Mã hóa đơn</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng đơn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($GetAllBill as $item)
                                    <tr>
                                        <td><a
                                                href="{{route('Thongtinhoadon',['customers_no'=>$item->CUSTOMER_NO, 'bill_id'=>$item->BILL_ID])}}">{{$item->BILL_NO}}</a>
                                        </td>
                                        <td>{{$item->CUSTOMER_PHONE}}</td>
                                        <td>
                                            @if ($item->BILL_STATUS==1)
                                            <span class="badge badge-danger">Đã thanh toán</span>
                                            @endif
                                            @if ($item->BILL_STATUS==2)
                                            <span class="badge badge-warning">Đang chờ xử lý</span>
                                            @endif
                                            @if ($item->BILL_STATUS==3)
                                            <span class="badge badge-info">Đang xử lý</span>
                                            @endif
                                            @if ($item->BILL_STATUS==4)
                                            <span class="badge badge-success">Đang giao hàng</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                {{number_format($item->BILL_TOTAL,2,',','.')}} vnđ</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <div class="float-left text-success">
                            <table >
                                <tbody>
                                    <tr>
                                        <td>Tổng số hóa đơn :</td>
                                        <td class="text-danger">{{$countAllBill}}</td>
                                    </tr>

                                    <tr>
                                        <td>Tổng doanh thu :</td>
                                        <td class="text-danger">{{number_format($totalAllBill,2,',','.')}} vnđ</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="float-right">
                            {{$GetAllBill->appends(['billToday' => $billToday->currentPage(), 'billThisMonth' => $billThisMonth->currentPage(),'GetAllBill' => $GetAllBill->currentPage()])->links()}}
                        </div>
                    </div>
                    <div>
                        @if ($errors->has('Search-All-Bill'))
                        <div >
                            <div class="alert alert-primary" role="alert">
                                {{ $errors->first('Search-All-Bill') }}
                            </div>

                        </div>
                        @endif
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->

</section>
<script src="{{asset('js/Plugins/Numeral-js/min/numeral.min.js')}}"></script>
<script src="{{asset('js/JQuery/StatisticsBills.js')}}"></script>
@endsection
