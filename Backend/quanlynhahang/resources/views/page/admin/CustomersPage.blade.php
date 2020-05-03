@extends('layout.AdminPageLayout')
@section('master-admin')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Khách Hàng</h1>
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
                    <form action="timkiemKH" method="GET" class="form-inline">
                        <input class="form-control mr-sm-2" name='search' type="search" placeholder="Tìm kiếm"
                            aria-label="Search">
                    </form>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã khách hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Tên đang nhập</th>
                                <th>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" disabled>
                                        <i class="fas fa-plus-circle"></i> Thêm mới
                                    </button>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $customers as $item )
                            <?php
                                $modalDeleteCustomer= "modal-Delete-Customers".$item->CUSTOMER_NO;
                            ?>
                            @if ($item->CUSTOMER_STATUS ==1)
                                <tr>
                                    <td></td>
                                    <td>{{$item->CUSTOMER_NO}}</td>
                                    <td>{{$item->CUSTOMER_NAME}}</td>
                                    <td>{{$item->CUSTOMER_PHONE}}</td>
                                    <td>{{$item->CUSTOMER_EMAIL}}</td>
                                    <td>{{$item->CUSTOMER_USERNAME}}</td>
                                    <td>
                                        <a href="{{ route('Khachhang/Thongtinkhachhang',['customers_no'=>$item->CUSTOMER_NO])}}"><i class="fas fa-info-circle text-secondary mr-3"></i></a>
                                        <i class="fas fa-edit text-success mr-3"></i>
                                        <!-- Button trigger modal -->
                                        <i class="fas fa-trash-alt text-danger"  data-toggle="modal"
                                        data-target="#{{$modalDeleteCustomer}}"></i>
                                    </td>
                                </tr>
                                <!-- Modal xóa -->
                                <div class="modal fade" id="{{$modalDeleteCustomer}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận khóa tài khoản</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('xoaKH',['customers_id' => $item->CUSTOMER_ID])}}"
                                                method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    Bạn có chắc chắn xác nhận xóa khách hàng <b>{{$item->CUSTOMER_NAME}}</b> có mã khách hàng là <b>{{$item->CUSTOMER_NO}}</b>?

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary " data-dismiss="modal">Trở
                                                        lại</button>
                                                    <button type="submit" class="btn btn-secondary">Tiếp tục</button>
                                                </div>
                                            </form>
                                            @if ( Session::has('success') )
                                            <div class="alert alert-success alert-dismissible m-2" role="alert"
                                                id="success-alert">
                                                <strong>{{ Session::get('success') }}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                            @endif

                                            <?php //Hiển thị thông báo lỗi?>
                                            @if ( Session::has('error') )
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <strong>{{ Session::get('error') }}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Mã khách hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Tên đang nhập</th>
                                <th></th>
                            </tr>
                        </tfoot>

                    </table>

                    <div class="d-flex justify-content-end mt-4">
                        {{$customers->links()}}
                        <?php //Hiển thị thông báo thành công?>
                    </div>
                </div>
                @if ( session('success') )
                <div class="alert alert-success alert-dismissible m-2" role="alert" id="success-alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                @endif

                <?php //Hiển thị thông báo lỗi?>
                @if ( session('error') )
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                @endif
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

<script>
    $('div.alert').not('.alert-important').delay(1000).fadeOut(350);
</script>
@endsection
