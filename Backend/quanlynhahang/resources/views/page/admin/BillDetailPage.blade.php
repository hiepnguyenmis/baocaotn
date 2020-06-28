@extends('layout.AdminPageLayout')
@section('master-admin')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Hóa đơn chi tiết</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="trangquanly">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Quản Lý Nhân Viên</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @foreach ($findBillid as $billId)
                    <h2>#{{$billId->BILL_NO}}</h2>
                    <h6>{{$billId->BILL_DATE}}</h6>
                    @endforeach
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    @foreach ($customers as $customer)
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mã khách hàng:</label>
                                    <p>{{$customer->CUSTOMER_NO}}</p>

                                    </div>
                                    <div class="form-group">
                                        <label>Tên khách hàng:</label>
                                    <p>{{$customer->CUSTOMER_NAME}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <p>{{$customer->CUSTOMER_EMAIL}}</p>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Địa chỉ:</label>
                                        <p>{{$customer->CUSTOMER_ADD}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại:</label>
                                        <p>{{$customer->CUSTOMER_PHONE}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ nhận hàng:</label>
                                    <p>{{$customer->CUSTOMER_ADDRESS}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    @endforeach
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
                                            @foreach ($billdetail as $item)
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
                                        <span class="text-danger">Tổng hóa đơn: {{number_format($total,0,',','.')}} đ</span>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary float-right" onclick="printJS('form-bill', 'html')"><i
                        class="fas fa-print mr-1"></i>In hóa đơn</button>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
<form id="form-bill">
    <!-- print -->
  <div class="container print-bill" style="font-size: 18px; line-height: 5px;">
    <div class="row">
        <div class="container mt-3">
            <div>
              <p>Tên cửa càng: ABC</p>
              <p>Địa chỉ: ABC</p>
              <p>Điện Thoại: 0909888555</p>
            </div>
            <div style="border:0.5px dashed"></div>
            <h5 style="text-align: center">HÓA ĐƠN CHI TIẾT</h5>
            @foreach ($findBillid as $print_bills)
            <p style="text-align: center; font-size: 16px"><b>Mã Hóa Đơn: {{$print_bills->BILL_NO}} </b></p>
            <p style="text-align: center; font-size: 12px"><b>Ngày Lập: {{$print_bills->BILL_DATE}}</b></p>
            @endforeach
            <div class="row">
              <div class="col-sm-6">
                <div style="line-height: 10px;">
                  @foreach ($customers as $print_customer)
                      <p>Mã khách hàng: {{$print_customer->CUSTOMER_NO}}</p>
                      <p>Tên khách hàng: {{$print_customer->CUSTOMER_NAME}}</p>
                      <p>Địa chỉ nhận hàng: {{$customer->CUSTOMER_ADDRESS}}</p>
                      <p>Số điện thoại: {{$customer->CUSTOMER_PHONE}}</p>
                      <p>Email: {{$customer->CUSTOMER_EMAIL}}</p>
                  @endforeach
                  @foreach ($findBillid as $printInfoBill)
                  <p>Thu Ngân: {{$printInfoBill->EMPLOYEES_LASTNAME}} {{$printInfoBill->EMPLOYEES_FIRSTNAME}}</p>
                  @endforeach
                  @php
                  $print_total=null;
                  @endphp
                  @foreach ($billdetail as $item)
                  @php
                     $print_intoMoney=$item->BILLDETAIL_AMOUNT * $item->BILLDETAIL_PRICE;
                     $print_total+=$print_intoMoney;
                  @endphp
                  @endforeach
                  <p>Tổng Tiền Hàng: {{number_format($print_total,0,',','.')}}  đ</p>
                  <p>Giảm Giá: 0 đ</p>
                  <p style="font-size: 20px"><b>Đã thanh toán: {{number_format($print_total,0,',','.')}} đ</b></p>
                  <p>Thuế: 0%</p>
                  <hr>
                </div>
              </div>
              <div class="col-sm-6">
              </div>
            </div>
          </div>
          <div class="mb-3" style="border:0.5px dashed"></div>
          <br>
          <br>
          <div >
            <table class="table  align-items-center table-flush accordion  " id="accordionRow" >
              <thead class="boder">
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">TenM/A</th>
                  <th scope="col">SL</th>
                  <th scope="col">ĐG</th>
                  <th scope="col">TT</th>
                </tr>
                <br>
              </thead>
              <tbody>
                  @php
                  $print_total=null;
                  $no=1;
                  @endphp
                  @foreach ($billdetail as $item)
                  @php
                     $print_intoMoney=$item->BILLDETAIL_AMOUNT * $item->BILLDETAIL_PRICE;
                     $print_total+=$print_intoMoney;
                  @endphp
                <tr  style="line-height: 1em">
                  <br>
                  <br>
                <td> {{$no++}}</td>

                  <td>{{$item->FOOD_NAME}}</td>
                  <td>
                      {{$item->BILLDETAIL_AMOUNT}}
                  </td>
                  <td>{{number_format($item->BILLDETAIL_PRICE,0,',','.')}} đ</td>
                  <td>{{number_format($print_intoMoney,0,',','.')}} đ</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
    </div>
  </div>
  <!-- end print -->
  </form>


@endsection
