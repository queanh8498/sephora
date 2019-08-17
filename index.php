<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lí Sephora</title>

    <link rel="stylesheet" href="public/vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="public\vendor\font-awesome-4.7.0\css\font-awesome.min.css">
    <style>
    div{
        border: 1px solid red;
    }
    
    </style>
</head>
<body>
    <!--CONTAINER-->
    <div class = "container">
        <div class="row">
            <div class="col-md-6 col-12 col-xl-3">LOGO</div>
            <div class="col-md-6 col-12 col-xl-9">Ten Cty</div>
        </div>
        

        <!--MAIN CONTENT-->
        <div class="row">
                <div class="col-md-3">

                <ul class="list-group">
                <li class="list-group-item"><a href="?page=loaisp_ds">Danh sách Loại sản phẩm</a></li>
                <li class="list-group-item"><a href="?page=sanpham_ds">Danh sách Sản phẩm</a></li>
                <li class="list-group-item"><a href="?page=nsx_ds">Danh sách NSX</a></li>
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
                }else if ($page == 'nsx_them'){
                    include('nsx/delete.php');
                }
                ?>
                </div>

        </div>
        <!--FOOTER-->
        <div class="row">
            <div class="col-md-4">ABOUT US</div>
            <div class="col-md-4">NEWS</div>
            <div class="col-md-4"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.055558884043!2d105.75892111404805!3d10.01226969284271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a088352c36316b%3A0x473b92ccd813f37!2zS0RDIDUxNSAoOTEvMjMgY8WpKSwgSMawbmcgTOG7o2ksIE5pbmggS2nhu4F1LCBD4bqnbiBUaMahLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1566034959300!5m2!1svi!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></div>
        </div>
    
    </div>


    <!--jquery-->
    <script src="public\vendor\jquery\jquery.js"></script>

    <!--popper-->
    <script src="public\vendor\popperjs\popper.min.js"></script>

    <!--bootstrap-->
    <script src="public\vendor\bootstrap\js\bootstrap.min.js"></script>
</body>
</html>