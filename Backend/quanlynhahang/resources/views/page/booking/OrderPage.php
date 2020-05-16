<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo asset('order/order.css') ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo asset('order/fontawesome/css/all.min.css') ?>">
    <title>Document</title>

    <script src="<?php echo asset('angularjs/lib/angular.min.js') ?>"></script>

</head>

<body class="bg-primary">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-while shadow-sm">
            <a class="navbar-brand">Brand</a>

            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Nhà Bếp</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Phòng/sảnh</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addroomandhall">Thêm
                                Phòng/Sảnh</a>
                            <a class="dropdown-item" href="#">Quản lý</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Thống kê trong ngày</a>
                    </li>
                </ul>
                <div class="modal fade" id="addroomandhall" tabindex="-1" role="dialog" aria-labelledby="addroomandhallModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addroomandhallModalLabel">Thêm Phòng/Sảnh</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <i class="fas fa-exclamation-triangle text-warning"></i> Để xem tất cả thông tin
                                        phòng/Sảnh xin vào phần quản lý
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="inputroomhall" class="font-weight-bold">Tên phòng/sảnh</label>
                                            <input type="text" id="inputroomhall" class="form-control" placeholder="Sảnh A">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img class="img-bordered mr-2 rounded-circle img-bordered-sm img-thumbnail img-fluid" src="<?php echo asset('image/smart-cart.png') ?>" alt="user image">
            <span class="mr-2">Xin chào, Admin!</span>
            <span data-toggle="tooltip" data-placement="left" title="Đăng xuất"><i class="fas fa-arrow-right"></i></span>
        </nav>
    </header>
    <div class=" container-fluid content-wrapper mt-3" ng-app='Order' ng-controller='OrderControler'>
        <div class="row">
            <div class="col-6">
                <div class="card shadow-sm rounded-0">
                    <div class="card-header p-1 pt-2 pl-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-7">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item dropdown mr-2">
                                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Phòng/Sảnh</a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Sảnh 1</a>
                                                <a class="dropdown-item" href="#">Sảnh 2</a>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#table" role="tab" aria-controls="pills-home" aria-selected="true">Bàn</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{buttonfoodstatus}}" id="pills-profile-tab " data-toggle="pill" href="#foods" role="tab" aria-controls="pills-profile" aria-selected="false">Thực
                                                đơn</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-5">
                                    <form action="timkiemKH" method="GET" class="form-inline">
                                        <input class="form-control mr-sm-2" name='search' type="search" placeholder="Tìm kiếm" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="table" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="card-body card-body-height-left" style="overflow-y: scroll">
                                <div class="container">
                                    <div class="row">
                                        <div class="filtr-item col-sm-2 bg-light border rounded mt-3 mr-3 pt-1" data-category="2" data-sort="white sample" ng-repeat='table in tables' ng-click='CreateBill(table.TABLE_ID)'>
                                            <img src="https://via.placeholder.com/300/fff?text={{table.TABLE_NO}}" class="img-fluid mb-2" alt="white sample" />

                                        </div>
                                        <div class="filtr-item col-sm-2 bg-light border rounded mt-3 mr-3 pt-1" data-category="2" data-sort="white sample">
                                            <img src="<?php echo asset('image/plus.png') ?>" class="img-fluid mb-2" alt="white sample" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="foods" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card-body card-body-height-left" style="overflow-y: scroll">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-3 mt-2" ng-repeat='food in foods'  data-toggle="tooltip" data-placement="bottom" title="{{food.FOOD_NAME}}">
                                            <div class="card shadow-sm">
                                                <div class="card-body">
                                                    <img src="https://via.placeholder.com/300/f70404?text=1" class="img-fluid mb-2" alt="white sample" />

                                                </div>
                                                <div class="card-footer">
                                                    <span class="shorten-string">{{food.FOOD_NAME}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 ">
                <div class="card shadow-sm">
                    <div class="card-header p-1 pt-2 pl-3">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Hóa đơn số 1</a>
                            </li>
                            <li class="nav-item dropdown ml-3">
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <a href="#" class="nav-link ml-2"><i class="fas fa-plus-circle"> Thêm hóa đơn</i></a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body  card-body-height-right" style="overflow-y: scroll ">

                        <div class=" post border mt-1 p-2 rounded shadow-sm">
                            <div class="user-block">
                                <img class="img-bordered rounded-circle img-bordered-sm img-thumbnail img-fluid" src="<?php echo asset('image/smart-cart.png') ?>" alt="user image">
                                <span class="ml-2">
                                    <a href="#">Tên món ăn: </a>
                                </span>
                                <span class="ml-2">abc</span>
                                <button type="button" class="close mb-2" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- /.user-block -->
                            <p class="m-0">
                                <a href="#" class="link-black text-sm"><i class="fas fa-info-circle mr-1 text-primary ml-2"></i></i> Số lượng: 1</a>
                                <span class="float-right">
                                    <a href="#" class="link-black text-ml">
                                        <i class="fas fa-toggle-on mr-1 text-success"></i> Đơn giá: 20.000
                                    </a>
                                </span>
                            </p>
                        </div>
                        <div class=" post border mt-1 p-2 rounded shadow-sm">
                            <div class="user-block">
                                <img class="img-bordered rounded-circle img-bordered-sm img-thumbnail img-fluid" src="<?php echo asset('image/smart-cart.png') ?>" alt="user image">
                                <span class="ml-2">
                                    <a href="#">Tên món ăn: </a>
                                </span>
                                <span class="ml-2">abc</span>
                                <button type="button" class="close mb-2" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- /.user-block -->
                            <p class="m-0">
                                <a href="#" class="link-black text-sm"><i class="fas fa-info-circle mr-1 text-primary ml-2"></i></i> Số lượng: 1</a>
                                <span class="float-right">
                                    <a href="#" class="link-black text-ml">
                                        <i class="fas fa-toggle-on mr-1 text-success"></i> Đơn giá: 20.000
                                    </a>
                                </span>
                            </p>
                        </div>
                        <div class=" post border mt-1 p-2 rounded shadow-sm">
                            <div class="user-block">
                                <img class="img-bordered rounded-circle img-bordered-sm img-thumbnail img-fluid" src="<?php echo asset('image/smart-cart.png') ?>" alt="user image">
                                <span class="ml-2">
                                    <a href="#">Tên món ăn: </a>
                                </span>
                                <span class="ml-2">abc</span>
                                <button type="button" class="close mb-2" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- /.user-block -->
                            <p class="m-0">
                                <a href="#" class="link-black text-sm"><i class="fas fa-info-circle mr-1 text-primary ml-2"></i></i> Số lượng: 1</a>
                                <span class="float-right">
                                    <a href="#" class="link-black text-ml">
                                        <i class="fas fa-toggle-on mr-1 text-success"></i> Đơn giá: 20.000
                                    </a>
                                </span>
                            </p>
                        </div>
                        <div class=" post border mt-1 p-2 rounded shadow-sm">
                            <div class="user-block">
                                <img class="img-bordered rounded-circle img-bordered-sm img-thumbnail img-fluid" src="<?php echo asset('image/smart-cart.png') ?>" alt="user image">
                                <span class="ml-2">
                                    <a href="#">Tên món ăn: </a>
                                </span>
                                <span class="ml-2">abc</span>
                                <button type="button" class="close mb-2" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- /.user-block -->
                            <p class="m-0">
                                <a href="#" class="link-black text-sm"><i class="fas fa-info-circle mr-1 text-primary ml-2"></i></i> Số lượng: 1</a>
                                <span class="float-right">
                                    <a href="#" class="link-black text-ml">
                                        <i class="fas fa-toggle-on mr-1 text-success"></i> Đơn giá: 20.000
                                    </a>
                                </span>
                            </p>
                        </div>
                        <div class=" post border mt-1 p-2 rounded shadow-sm">
                            <div class="user-block">
                                <img class="img-bordered rounded-circle img-bordered-sm img-thumbnail img-fluid" src="<?php echo asset('image/smart-cart.png') ?>" alt="user image">
                                <span class="ml-2">
                                    <a href="#">Tên món ăn: </a>
                                </span>
                                <span class="ml-2">abc</span>
                                <button type="button" class="close mb-2" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- /.user-block -->
                            <p class="m-0">
                                <a href="#" class="link-black text-sm"><i class="fas fa-info-circle mr-1 text-primary ml-2"></i></i> Số lượng: 1</a>
                                <span class="float-right">
                                    <a href="#" class="link-black text-ml">
                                        <i class="fas fa-toggle-on mr-1 text-success"></i> Đơn giá: 20.000
                                    </a>
                                </span>
                            </p>
                        </div>
                        <div class=" post border mt-1 p-2 rounded shadow-sm">
                            <div class="user-block">
                                <img class="img-bordered rounded-circle img-bordered-sm img-thumbnail img-fluid" src="<?php echo asset('image/smart-cart.png') ?>" alt="user image">
                                <span class="ml-2">
                                    <a href="#">Tên món ăn: </a>
                                </span>
                                <span class="ml-2">abc</span>
                                <button type="button" class="close mb-2" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- /.user-block -->
                            <p class="m-0">
                                <a href="#" class="link-black text-sm"><i class="fas fa-info-circle mr-1 text-primary ml-2"></i></i> Số lượng: 1</a>
                                <span class="float-right">
                                    <a href="#" class="link-black text-ml">
                                        <i class="fas fa-toggle-on mr-1 text-success"></i> Đơn giá: 20.000
                                    </a>
                                </span>
                            </p>
                        </div>
                        <div class=" post border mt-1 p-2 rounded shadow-sm">
                            <div class="user-block">
                                <img class="img-bordered rounded-circle img-bordered-sm img-thumbnail img-fluid" src="<?php echo asset('image/smart-cart.png') ?>" alt="user image">
                                <span class="ml-2">
                                    <a href="#">Tên món ăn: </a>
                                </span>
                                <span class="ml-2">abc</span>
                                <button type="button" class="close mb-2" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- /.user-block -->
                            <p class="m-0">
                                <a href="#" class="link-black text-sm"><i class="fas fa-info-circle mr-1 text-primary ml-2"></i></i> Số lượng: 1</a>
                                <span class="float-right">
                                    <a href="#" class="link-black text-ml">
                                        <i class="fas fa-toggle-on mr-1 text-success"></i> Đơn giá: 20.000
                                    </a>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6">
                                    <!-- Button trigger modal -->
                                    <span data-toggle="modal" data-target="#mergebill" class="text-success">
                                        <i class="fas fa-book-open"></i> Tách ghép đơn hàng
                                    </span>

                                    <!-- Modal -->
                                    <div class="modal fade" id="mergebill" tabindex="-1" role="dialog" aria-labelledby="mergebillModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="mergebillModalLabel">Tách ghép đơn hàng
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <h5>Ghép đơn hàng</h5>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <i class="fas fa-exclamation-triangle text-warning"></i>
                                                                        Khi gọp hóa đơn các thông tin hóa đơn sẽ chuyển
                                                                        sang cho người được chuyển.
                                                                        <div class="form-group">
                                                                            <label for="mergebillwith">Ghép
                                                                                hóa đơn </label>
                                                                            <select class="form-control" id="mergebillwith">
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>5</option>
                                                                            </select>
                                                                            <label for="mergebillwithbill"> Với hóa
                                                                                đơn</label>
                                                                            <select class="form-control" id="mergebillwithbill">
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>5</option>
                                                                            </select>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary float-right">Ghép
                                                                            đơn</button>

                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlSelect1">Ghép
                                                                                hóa đơn với hóa đơn bàn</label>
                                                                            <select class="form-control" id="exampleFormControlSelect1">
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>5</option>
                                                                            </select>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary float-right">Ghép
                                                                            đơn</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h5 class="mt-2">Tách đơn hàng</h5>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <span>
                                                                        <i class="fas fa-exclamation-triangle text-warning"></i>
                                                                        Chọn những món ăn cần tách hóa đơn. Hóa đơn sẽ
                                                                        được thêm vào tab hóa đơn và chờ thanh toán
                                                                    </span>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card">
                                                                            <div class="card-body card-merge-bill" style="overflow-y: scroll">
                                                                                <div class=" post border mt-1 p-2 rounded shadow-sm">
                                                                                    <div class="user-block">
                                                                                        <img class="img-bordered rounded-circle img-bordered-sm img-thumbnail img-fluid" src="<?php echo asset('image/smart-cart.png') ?>" alt="user image">
                                                                                        <span class="ml-2">
                                                                                            <a href="#">Tên món ăn: </a>
                                                                                        </span>
                                                                                        <span class="ml-2">abc</span>
                                                                                        <div class="custom-control custom-checkbox close mb-2">
                                                                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                                            <label class="custom-control-label" for="customCheck1"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- /.user-block -->
                                                                                    <p class="m-0">
                                                                                        <a href="#" class="link-black text-sm"><i class="fas fa-info-circle mr-1 text-primary ml-2"></i></i>
                                                                                            Số lượng: 1</a>
                                                                                        <span class="float-right">
                                                                                            <a href="#" class="link-black text-ml">
                                                                                                <i class="fas fa-toggle-on mr-1 text-success"></i>
                                                                                                Đơn giá: 20.000
                                                                                            </a>
                                                                                        </span>
                                                                                    </p>
                                                                                </div>
                                                                                <div class=" post border mt-1 p-2 rounded shadow-sm">
                                                                                    <div class="user-block">
                                                                                        <img class="img-bordered rounded-circle img-bordered-sm img-thumbnail img-fluid" src="<?php echo asset('image/smart-cart.png') ?>" alt="user image">
                                                                                        <span class="ml-2">
                                                                                            <a href="#">Tên món ăn: </a>
                                                                                        </span>
                                                                                        <span class="ml-2">abc</span>
                                                                                        <div class="custom-control custom-checkbox close mb-2">
                                                                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                                            <label class="custom-control-label" for="customCheck1"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- /.user-block -->
                                                                                    <p class="m-0">
                                                                                        <a href="#" class="link-black text-sm"><i class="fas fa-info-circle mr-1 text-primary ml-2"></i></i>
                                                                                            Số lượng: 1</a>
                                                                                        <span class="float-right">
                                                                                            <a href="#" class="link-black text-ml">
                                                                                                <i class="fas fa-toggle-on mr-1 text-success"></i>
                                                                                                Đơn giá: 20.000
                                                                                            </a>
                                                                                        </span>
                                                                                    </p>
                                                                                </div>
                                                                                <div class=" post border mt-1 p-2 rounded shadow-sm">
                                                                                    <div class="user-block">
                                                                                        <img class="img-bordered rounded-circle img-bordered-sm img-thumbnail img-fluid" src="<?php echo asset('image/smart-cart.png') ?>" alt="user image">
                                                                                        <span class="ml-2">
                                                                                            <a href="#">Tên món ăn: </a>
                                                                                        </span>
                                                                                        <span class="ml-2">abc</span>
                                                                                        <div class="custom-control custom-checkbox close mb-2">
                                                                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                                            <label class="custom-control-label" for="customCheck1"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- /.user-block -->
                                                                                    <p class="m-0">
                                                                                        <a href="#" class="link-black text-sm"><i class="fas fa-info-circle mr-1 text-primary ml-2"></i></i>
                                                                                            Số lượng: 1</a>
                                                                                        <span class="float-right">
                                                                                            <a href="#" class="link-black text-ml">
                                                                                                <i class="fas fa-toggle-on mr-1 text-success"></i>
                                                                                                Đơn giá: 20.000
                                                                                            </a>
                                                                                        </span>
                                                                                    </p>
                                                                                </div>
                                                                                <div class=" post border mt-1 p-2 rounded shadow-sm">
                                                                                    <div class="user-block">
                                                                                        <img class="img-bordered rounded-circle img-bordered-sm img-thumbnail img-fluid" src="<?php echo asset('image/smart-cart.png') ?>" alt="user image">
                                                                                        <span class="ml-2">
                                                                                            <a href="#">Tên món ăn: </a>
                                                                                        </span>
                                                                                        <span class="ml-2">abc</span>
                                                                                        <div class="custom-control custom-checkbox close mb-2">
                                                                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                                            <label class="custom-control-label" for="customCheck1"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- /.user-block -->
                                                                                    <p class="m-0">
                                                                                        <a href="#" class="link-black text-sm"><i class="fas fa-info-circle mr-1 text-primary ml-2"></i></i>
                                                                                            Số lượng: 1</a>
                                                                                        <span class="float-right">
                                                                                            <a href="#" class="link-black text-ml">
                                                                                                <i class="fas fa-toggle-on mr-1 text-success"></i>
                                                                                                Đơn giá: 20.000
                                                                                            </a>
                                                                                        </span>
                                                                                    </p>
                                                                                </div>
                                                                                <div class=" post border mt-1 p-2 rounded shadow-sm">
                                                                                    <div class="user-block">
                                                                                        <img class="img-bordered rounded-circle img-bordered-sm img-thumbnail img-fluid" src="<?php echo asset('image/smart-cart.png') ?>" alt="user image">
                                                                                        <span class="ml-2">
                                                                                            <a href="#">Tên món ăn: </a>
                                                                                        </span>
                                                                                        <span class="ml-2">abc</span>
                                                                                        <div class="custom-control custom-checkbox close mb-2">
                                                                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                                            <label class="custom-control-label" for="customCheck1"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- /.user-block -->
                                                                                    <p class="m-0">
                                                                                        <a href="#" class="link-black text-sm"><i class="fas fa-info-circle mr-1 text-primary ml-2"></i></i>
                                                                                            Số lượng: 1</a>
                                                                                        <span class="float-right">
                                                                                            <a href="#" class="link-black text-ml">
                                                                                                <i class="fas fa-toggle-on mr-1 text-success"></i>
                                                                                                Đơn giá: 20.000
                                                                                            </a>
                                                                                        </span>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-footer bg-while">
                                                                                <button type="submit" class="btn btn-primary float-md-right">Tạo
                                                                                    hóa đơn</button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-12 mt-2">
                                                                        <span>Hóa đơn vừa được tạo</span>
                                                                        <div class="card">
                                                                            <div class="card-body card-merge-bill" style="overflow-y: scroll">
                                                                                <div class=" post border mt-1 p-2 rounded shadow-sm">
                                                                                    <div class="user-block">
                                                                                        <img class="img-bordered rounded-circle img-bordered-sm img-thumbnail img-fluid" src="<?php echo asset('image/smart-cart.png') ?>" alt="user image">
                                                                                        <span class="ml-2">
                                                                                            <a href="#">Mã hóa đơn :
                                                                                            </a>
                                                                                        </span>
                                                                                        <span class="ml-2">abc</span>
                                                                                        <div class="close mb-2">
                                                                                            <i class="fas fa-arrow-right"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- /.user-block -->
                                                                                    <p class="m-0">
                                                                                        <a href="#" class="link-black text-sm"><i class="fas fa-info-circle mr-1 text-primary ml-2"></i></i>
                                                                                            Số hóa đơn: 1</a>
                                                                                        <span class="float-right">
                                                                                            <a href="#" class="link-black text-ml">
                                                                                                <i class="fas fa-toggle-on mr-1 text-success"></i>
                                                                                                Tổng đơn: 20.000
                                                                                            </a>
                                                                                        </span>
                                                                                    </p>
                                                                                </div>
                                                                                <div class=" post border mt-1 p-2 rounded shadow-sm">
                                                                                    <div class="user-block">
                                                                                        <img class="img-bordered rounded-circle img-bordered-sm img-thumbnail img-fluid" src="<?php echo asset('image/smart-cart.png') ?>" alt="user image">
                                                                                        <span class="ml-2">
                                                                                            <a href="#">Mã hóa đơn :
                                                                                            </a>
                                                                                        </span>
                                                                                        <span class="ml-2">abc</span>
                                                                                        <div class="close mb-2">
                                                                                            <i class="fas fa-arrow-right"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- /.user-block -->
                                                                                    <p class="m-0">
                                                                                        <a href="#" class="link-black text-sm"><i class="fas fa-info-circle mr-1 text-primary ml-2"></i></i>
                                                                                            Số hóa đơn: 1</a>
                                                                                        <span class="float-right">
                                                                                            <a href="#" class="link-black text-ml">
                                                                                                <i class="fas fa-toggle-on mr-1 text-success"></i>
                                                                                                Tổng đơn: 20.000
                                                                                            </a>
                                                                                        </span>
                                                                                    </p>
                                                                                </div>
                                                                                <div class=" post border mt-1 p-2 rounded shadow-sm">
                                                                                    <div class="user-block">
                                                                                        <img class="img-bordered rounded-circle img-bordered-sm img-thumbnail img-fluid" src="<?php echo asset('image/smart-cart.png') ?>" alt="user image">
                                                                                        <span class="ml-2">
                                                                                            <a href="#">Mã hóa đơn :
                                                                                            </a>
                                                                                        </span>
                                                                                        <span class="ml-2">abc</span>
                                                                                        <div class="close mb-2">
                                                                                            <i class="fas fa-arrow-right"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- /.user-block -->
                                                                                    <p class="m-0">
                                                                                        <a href="#" class="link-black text-sm"><i class="fas fa-info-circle mr-1 text-primary ml-2"></i></i>
                                                                                            Số hóa đơn: 1</a>
                                                                                        <span class="float-right">
                                                                                            <a href="#" class="link-black text-ml">
                                                                                                <i class="fas fa-toggle-on mr-1 text-success"></i>
                                                                                                Tổng đơn: 20.000
                                                                                            </a>
                                                                                        </span>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-primary float-lg-right" data-toggle="modal" data-target="#staticBackdrop">
                                        Thanh toán
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class=" modal fade modal-right" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="staticBackdropLabel">Phiếu thanh toán - Hóa đơn số ...
                                    </h4>
                                    <button type="button" class="close bg-se" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-8">

                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <h4>Chi tiết hóa đơn</h4>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                <label class="custom-control-label text-success" for="customCheck1">Trả một phần</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Tên món ăn</th>
                                                                    <th scope="col">Đơn vị</th>
                                                                    <th scope="col">Đơn giá</th>
                                                                    <th scope="col">Thành tiền</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>Mark</td>
                                                                    <td>Otto</td>
                                                                    <td>@mdo</td>
                                                                    <td>@mdo</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>Jacob</td>
                                                                    <td>Thornton</td>
                                                                    <td>@fat</td>
                                                                    <td>@fat</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="row">
                                                    <div class="col-6"></div>
                                                    <div class="col-6 text-secondary"> 5/6/2020 3:20 PM</div>
                                                </div>
                                                <div class="row">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>Tổng tiền hàng: </td>
                                                                <td>20000đ</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Khuyến mãi: </td>
                                                                <td> <input type="text" class="form-control"> </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Khách hàng trả: </td>
                                                                <td>
                                                                    <input type="text" class="form-control">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tiền thừa trả khách: </td>
                                                                <td> </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="button" class="btn btn-primary">Thanh toán và in hóa đơn</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <span class="text-center">Hotline 19001900 &copy;2019-2020 </span>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="<?php echo asset('order/js/jquery-3.5.1.min.js') ?>"></script>
    <script src="<?php echo asset('order/js/js-sidebar.js') ?>"></script>
    <script src="<?php echo asset('angularjs/app/app.js') ?>"></script>
</body>

</html>
