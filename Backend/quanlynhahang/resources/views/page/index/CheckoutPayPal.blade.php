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

    <!-- Responsive CSS -->
    <link href="{{asset('index/css/responsive/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


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
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="post-title">
                        <h2>Proin et sem cursus, placerat odio quis, consectetur turpis</h2>
                        <a href="#">Maecenas sit amet quam magna</a>
                    </div>
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5><i class="fas fa-info"></i> Note:</h5>
                                            This page has been enhanced for printing. Click the print button at the
                                            bottom of the invoice to test.
                                        </div>

                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="invoice p-3 mb-3">
                                                <!-- title row -->
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4>
                                                            <i class="fas fa-globe"></i> AdminLTE, Inc.
                                                            <small class="float-right">Date: 2/10/2014</small>
                                                        </h4>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- info row -->
                                                <div class="row invoice-info">
                                                    <div class="col-sm-4 invoice-col">
                                                        From
                                                        <address>
                                                            <strong>Admin, Inc.</strong><br>
                                                            795 Folsom Ave, Suite 600<br>
                                                            San Francisco, CA 94107<br>
                                                            Phone: (804) 123-5432<br>
                                                            Email: info@almasaeedstudio.com
                                                        </address>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-4 invoice-col">
                                                        To
                                                        <address>
                                                            <strong>John Doe</strong><br>
                                                            795 Folsom Ave, Suite 600<br>
                                                            San Francisco, CA 94107<br>
                                                            Phone: (555) 539-1037<br>
                                                            Email: john.doe@example.com
                                                        </address>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-4 invoice-col">
                                                        <b>Invoice #007612</b><br>
                                                        <br>
                                                        <b>Order ID:</b> 4F3S8J<br>
                                                        <b>Payment Due:</b> 2/22/2014<br>
                                                        <b>Account:</b> 968-34567
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <!-- Table row -->
                                                <div class="row">
                                                    <div class="col-12 table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Qty</th>
                                                                    <th>Product</th>
                                                                    <th>Serial #</th>
                                                                    <th>Description</th>
                                                                    <th>Subtotal</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Call of Duty</td>
                                                                    <td>455-981-221</td>
                                                                    <td>El snort testosterone trophy driving gloves
                                                                        handsome
                                                                    </td>
                                                                    <td>$64.50</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Need for Speed IV</td>
                                                                    <td>247-925-726</td>
                                                                    <td>Wes Anderson umami biodiesel</td>
                                                                    <td>$50.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Monsters DVD</td>
                                                                    <td>735-845-642</td>
                                                                    <td>Terry Richardson helvetica tousled street art
                                                                        master
                                                                    </td>
                                                                    <td>$10.70</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Grown Ups Blue Ray</td>
                                                                    <td>422-568-642</td>
                                                                    <td>Tousled lomo letterpress</td>
                                                                    <td>$25.99</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <div class="row">
                                                    <!-- accepted payments column -->
                                                    <div class="col-6">
                                                        <p class="lead">Payment Methods:</p>
                                                        <img src="../../dist/img/credit/visa.png" alt="Visa">
                                                        <img src="../../dist/img/credit/mastercard.png"
                                                            alt="Mastercard">
                                                        <img src="../../dist/img/credit/american-express.png"
                                                            alt="American Express">
                                                        <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                                                        <p class="text-muted well well-sm shadow-none"
                                                            style="margin-top: 10px;">
                                                            Etsy doostang zoodles disqus groupon greplin oooj voxy
                                                            zoodles,
                                                            weebly ning heekya handango imeem
                                                            plugg
                                                            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt
                                                            zimbra.
                                                        </p>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-6">
                                                        <p class="lead">Amount Due 2/22/2014</p>

                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tr>
                                                                    <th style="width:50%">Subtotal:</th>
                                                                    <td>$250.30</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tax (9.3%)</th>
                                                                    <td>$10.34</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Shipping:</th>
                                                                    <td>$5.80</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total:</th>
                                                                    <td>$265.24</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <!-- this row will not appear when printing -->
                                                <div class="row no-print">
                                                    <div class="col-12">
                                                        <a href="invoice-print.html" target="_blank"
                                                            class="btn btn-default"><i class="fas fa-print"></i>
                                                            Print</a>
                                                        <button type="button" class="btn btn-success float-right"><i
                                                                class="far fa-credit-card"></i> Submit
                                                            Payment
                                                        </button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->

                </div>
            </div>
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
