<?php
require_once __DIR__ . "/../dbconnect.php";

$page = isset($_GET['page']) ? $_GET['page'] : 'loaisp_ds';
?>

<!--stcky sidebar-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lí Sephora</title>

    <link rel="stylesheet" href="./../public/vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./../public\vendor\font-awesome-4.7.0\css\font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="./../stylesheet.css">


    <?php if($page == 'dashboard') { ?>
        <link rel="stylesheet" href="./../public/vendor/Chart.js/Chart.min.css">
    <?php } ?>

</head>

<body>
    <!--CONTAINER-->
    <div class = "container-fluid">
    <div class="header">

        <div class="container-wrapper">
            <div class="text-right" > 
                    <i class="fa fa-user-circle-o" style="font-size:20px; margin-top: 5px;">&nbsp;Sign in &nbsp;</i>
            </div>
                <div class="container text-center">
                    <br>
                    <h2>S E P H O R A</h2>
                    <p>Paradise belongs to a half of the whole world</p>
                
                        <div class="container-form-search">
                        <form id="form-search" method="get" action="?page=timkiem" class="ng-pristine ng-valid"><!--chưa đc-->
                            <div class="input-search">
                            <input type="text" data-ng-model="textSearch" name="keyword_tensanpham" auto-complete placeholder="Tìm kiếm sản phẩm..." id="input-search" class="ng-pristine ng-untouched ng-valid ui-autocomplete-input" autocomplete="off">
                            <span class="fa fa-search"></span>
                            </div><!--close input-search-->
                        </form>
                        </div><!--close container-form-search-->


                </div><!--close "container text-center-->
        </div><!--close container-wrapper-->
        <!--ICON-->
        <div class="text-right"> 
        <i class="fa fa-heart-o" style="font-size:24px"></i>
        &nbsp;&nbsp;
        <i class="fa fa-facebook" style="font-size:24px"></i>
        &nbsp;&nbsp;
        <i class="fa fa-cart-plus" style="font-size:24px"></i>
        &nbsp;&nbsp;
        </div>

<!--THANH LOGO - NEW - BRANDS ... -->
<nav class="navbar navbar-expand-md sticky-top" style="background-color:white;color:black" >
  <!--Brand-->
  <div class="container justify-content-center">
    <nav class="stroke">
    <!--<a class="navbar-brand" href="#" style="background-color:white;color:black">LOGO</a>-->
    <!-- Links-->
      <ul class="navbar-nav" >
        <li class="nav-item">
          <a class ="nav-link" href="/sephora/backend/index.php">HOME</a>
        </li>
        
        <li class="nav-item">
          <a class ="nav-link" href="#">NEW</a>
        </li>
        <li class="nav-item">
          <a class ="nav-link" href="#">BRANDS</a>
        </li>
        
        <li class="nav-item">
          <a class ="nav-link" href="#">CONTACT</a>
        </li>
    <!--THANH THẢ XUỐNG-->
        <li class="nav-item dropdown">
          <a class ="nav-link dropdown-toggle" href="#" data-toggle="dropdown">ABOUT BEAUTY</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Fashion Trends</a>
                <a class="dropdown-item" href="#">Makeup Trends</a>
                <a class="dropdown-item" href="#">Skincare</a>
            </div>
        </li>
      </ul>
    </nav>
  </div>
</nav>

</div>
    </div>

        

        <!--MAIN CONTENT-->
        <div class="row">
                <div class="col-md-3">

                <ul class="list-group">
                <li class="list-group-item"><a href="?page=dangky">ĐĂNG KÝ</a></li>

                <?php if(isset($_SESSION['kh_tendangnhap']) && !empty($_SESSION['kh_tendangnhap'])) : ?>
                        <li class="list-group-item"><a href="/sephora/backend/pages/dangxuat.php">Đăng xuất</a></li>
                <?php else : ?>
                        <li class="list-group-item"><a href="?page=dangnhap">Đăng nhập</a></li>
                <?php endif ?>
                <li class="list-group-item"><a href="?page=loaisp_ds">Danh sách Loại sản phẩm</a></li>
                <li class="list-group-item"><a href="?page=sanpham_ds">Danh sách Sản phẩm</a></li>
                <li class="list-group-item"><a href="?page=nsx_ds">Danh sách NSX</a></li>
                <li class="list-group-item"><a href="?page=hinhsp_ds">Danh sách Hình sản phẩm</a></li>
                </ul>

                </div>
                <div class="col-md-9">
                <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 'loaisp_ds';
                if ($page == 'loaisp_ds'){
                    include('loaisp/display.php');
                }else if ($page == 'sanpham_ds'){
                    include("sanpham/display.php");
                }else if ($page == 'nsx_ds'){
                    include("nsx/display.php");
                }else if ($page == 'loaisp_them'){
                    include("loaisp/create.php");
                }else if ($page == 'sanpham_them'){
                    include('sanpham/create.php');
                }else if ($page == 'nsx_them'){
                    include('nsx/create.php');
                }else if ($page == 'loaisp_xoa'){
                    include("loaisp/delete.php");
                }else if ($page == 'sanpham_xoa'){
                    include('sanpham/delete.php');
                }else if ($page == 'nsx_xoa'){
                    include('nsx/delete.php');
                }else if ($page == 'loaisp_sua'){
                    include("loaisp/edit.php");
                }else if ($page == 'sanpham_sua'){
                    include('sanpham/edit.php');
                }else if ($page == 'nsx_sua'){
                    include('nsx/edit.php');
                }else if ($page == 'dangky'){
                    include('pages/dangky.php');
                }else if ($page == 'dangnhap'){
                    include('pages/dangnhap.php');
                }else if ($page == 'hinhsp_ds'){
                    include('hinhsanpham/display.php');
                }else if ($page == 'hinhsp_them'){
                    include('hinhsanpham/create.php');
                }else if ($page == 'dashboard'){
                    include('pages/dashboard.php');
                }else if ($page == 'timkiem'){
                    include('pages/timkiem.php');
                }
                ?>
                </div>

        </div>
        <br>
        <hr>
        <!--FOOTER-->
        <div class="row" style="background-color:black;color:white;">
            <div class="col-md-4">ABOUT US</div>
            <div class="col-md-4">NEWS</div>
            <div class="col-md-4"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.055558884043!2d105.75892111404805!3d10.01226969284271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a088352c36316b%3A0x473b92ccd813f37!2zS0RDIDUxNSAoOTEvMjMgY8WpKSwgSMawbmcgTOG7o2ksIE5pbmggS2nhu4F1LCBD4bqnbiBUaMahLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1566034959300!5m2!1svi!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></div>
        </div>
    </div>


    <!--jquery-->
    <script src="./../public/vendor/jquery/jquery.min.js"></script>

    <!--popper-->
    <script src="./../public/vendor/popperjs/popper.min.js"></script>

    <!--bootstrap-->
    <script src="./../public/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!--sweetalert-->
    <script src="./../public/vendor/sweetalert/sweetalert2.all.min.js"></script>
    
    <!--custom script--> 
    <?php if ($page == 'loaisp_ds'){ ?>
        <script src="./../public/js/loaisp/loaisp.js"></script>
    <?php } elseif ($page == 'sanpham_ds'){ ?>
        <script src="./../public/js/sp/sp.js"></script>
    <?php } elseif ($page == 'nsx_ds'){ ?>
        <script src="./../public/js/nsx/nsx.js"></script>
    <?php } elseif ($page == 'loaisp_them'){ ?>
        <script src="./../public/js/loaisp/kt_loaisp.js"></script>
        <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"></script>
        <script src="./../public/vendor/jqueryvalidation/localization/messages_vi.min.js"></script>
    <?php } elseif ($page == 'sanpham_them'){ ?>
        <script src="./../public/js/sp/kt_sp.js"></script>
        <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"></script>
        <script src="./../public/vendor/jqueryvalidation/localization/messages_vi.min.js"></script>
    <?php } elseif ($page == 'nsx_them'){ ?>
        <script src="./../public/js/nsx/kt_nsx.js"></script>
        <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"></script>
        <script src="./../public/vendor/jqueryvalidation/localization/messages_vi.min.js"></script>
    <?php } elseif ($page == 'loaisp_sua'){ ?>
        <script src="./../public/js/loaisp/kt_loaisp.js"></script>
        <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"></script>
        <script src="./../public/vendor/jqueryvalidation/localization/messages_vi.min.js"></script>
    <?php } elseif ($page == 'sanpham_sua'){ ?>
        <script src="./../public/js/loaisp/kt_sp.js"></script>
        <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"></script>
        <script src="./../public/vendor/jqueryvalidation/localization/messages_vi.min.js"></script>
    <?php } elseif ($page == 'nsx_sua'){ ?>
        <script src="./../public/js/nsx/kt_nsx.js"></script>
        <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"></script>
        <script src="./../public/vendor/jqueryvalidation/localization/messages_vi.min.js"></script>
    <?php } elseif($page == 'dashboard') {?>
        <script src="./../public/vendor/Chart.js/Chart.min.js"></script>
        <script src="./../public/js/pages/dashboard.js"></script>
    <?php } ?>


</body>
</html>