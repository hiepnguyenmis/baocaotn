@extends('layout.AdminPageLayout');
@section('master-admin')

<section class="content-header ">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Khách Hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @php
                $customer_id=null;
                @endphp
                <!-- Profile Image -->
                @foreach ($customers as $customer)
                @php
                $customer_id=$customer->CUSTOMER_NO;
                @endphp
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">

                            <img class="profile-user-img img-fluid img-circle"
                                src="../../uploads/{{$customer->CUSTOMER_IMG}}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$customer->CUSTOMER_NAME}}</h3>

                        <p class="text-muted text-center">{{$customer->CUSTOMER_NO}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                @php
                                $status=null;
                                if($customer->CUSTOMER_STATUS==1){
                                $status= 'Đang hoạt động';
                                }else{
                                $status= 'Ngưng hoạt động';
                                }
                                @endphp
                                <b>Trạng thái</b> <a class="float-right">{{$status}}</a>
                            </li>
                            <li class="list-group-item">
                                @php
                                $mark=null;
                                $id_modal_block_account=$customer->CUSTOMER_ID.'modal'.'5468';

                                if($customer->CUSTOMER_MARK==null){
                                $mark=0;
                                }
                                else{
                                $mark=$customer->CUSTOMER_MARK;
                                }
                                @endphp
                                <b>Lượt mua</b> <a class="float-right">{{$mark}}</a>
                            </li>

                        </ul>
                        <button class="btn btn-primary btn-block" data-toggle="modal"
                            data-target="#modalDelete"><b>Khóa</b></button>
                        {{-- model block account --}}
                        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalDeleteModalLabel">Xác nhận xóa tài khoản vĩnh
                                            viễn</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('xoaKH',['customers_id' => $customer->CUSTOMER_ID])}}"
                                        method="post">
                                        @csrf
                                        <div class="modal-body">
                                            Bạn sẽ xóa nhân viên có mã khách hàng là <b>{{$customer->CUSTOMER_NO}}</b>
                                            tên khách hàng là <b>{{$customer->CUSTOMER_NAME}}</b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary">Tiếp
                                                tục</button>
                                            <button type="button" class="btn btn-primary"
                                                data-dismiss="modal">Hủy</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin khách hàng</h3>
                    </div>
                    <!-- /.card-header -->
                    @foreach ($customers as $customer)
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Email</strong>
                        <p class="text-muted">
                            {{$customer->CUSTOMER_EMAIL}}
                        </p>
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ </strong>
                        <p class="text-muted">{{$customer->CUSTOMER_ADD}}</p>
                        <p class="text-muted">{{$customer->CUSTOMER_ADD}}</p>
                        <hr>
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Số điện thoại</strong>
                        <p class="text-muted">
                            {{$customer->CUSTOMER_PHONE}}
                        </p>
                        <hr>
                        <strong><i class="far fa-file-alt mr-1"></i> Tên đăng nhập </strong>

                        <p class="text-muted">{{$customer->CUSTOMER_USERNAME}}</p>
                    </div>
                    @endforeach
                    <!-- /.card-body -->
                </div>
                @endforeach
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <div class="row">
                            <div class="col-8">
                                <h2>Lịch sử mua hàng</h2>
                            </div>
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                @foreach ($bills as $item)
                                <div class="post border p-2 rounded">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="{{asset('image/smart-cart.png')}}"
                                            alt="user image">
                                        <span class="username">
                                            <a href="#">Mã: {{$item->BILL_NO}}</a>
                                        </span>
                                        <span class="description">{{$item->BILL_DATE}}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p class="m-0">
                                        <a href="{{ route('Khachhang/Thongtinkhachhang/tthd',['customers_no'=>$customer_id,'bill_id'=>$item->BILL_ID])}}"
                                            class="link-black text-sm"><i
                                                class="fas fa-info-circle mr-1 text-primary"></i></i> Chi tiết hóa
                                            đơn</a>
                                        <span class="float-right">
                                            <a href="#" class="link-black text-ml">
                                                <i class="fas fa-toggle-on mr-1 text-success"></i> Đã thanh toán
                                            </a>
                                        </span>
                                    </p>

                                </div>
                                @endforeach
                                <div class="mt-2">
                                    {{$bills->links()}}
                                </div>
                                <!-- /.post -->
                                <!-- Modal post-->
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-danger">
                                            10 Feb. 2014
                                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-envelope bg-primary"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email
                                            </h3>

                                            <div class="timeline-body">
                                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                quora plaxo ideeli hulu weebly balihoo...
                                            </div>
                                            <div class="timeline-footer">
                                                <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-user bg-info"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                            <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted
                                                your friend request
                                            </h3>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-comments bg-warning"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>
                                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post
                                            </h3>
                                            <div class="timeline-body">
                                                Take me to your leader!
                                                Switzerland is small and neutral!
                                                We are more like Germany, ambitious and misunderstood!
                                            </div>
                                            <div class="timeline-footer">
                                                <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-success">
                                            3 Jan. 2014
                                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-camera bg-purple"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                            <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos
                                            </h3>

                                            <div class="timeline-body">
                                                <img src="http://placehold.it/150x100" alt="...">
                                                <img src="http://placehold.it/150x100" alt="...">
                                                <img src="http://placehold.it/150x100" alt="...">
                                                <img src="http://placehold.it/150x100" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience"
                                                placeholder="Experience"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSkills"
                                                placeholder="Skills">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms and
                                                        conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
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
@endsection
