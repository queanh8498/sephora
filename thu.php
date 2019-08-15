<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sephora: Cosmetic, Beauty products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <style>
  .carousel-inner img{
    width: 800px;
    height: 500px;
    margin-left:auto;
    margin-right:auto;
    display:block;
    
    /*3 dong cuối là căn giữa hinh anh. nhớ nhé !!! */
  }
  
  .nav-item a{
    background-color:black;
    color:white;
  }
  
  .dropdown:hover .dropdown-menu {
  display: block;
}

.thumbnails img{
  margin-left:auto;
  margin-right:auto;
  display:block;
  
}
  </style>

</head>
<body>

<div class="text-center" style="margin-top:10px;margin-bottom:10px">
  <h2>S E P H O R A</h2>
  <p>Paradise belongs to a half of the whole world</p>

<!--ICON-->
  <div class="text-right" style="margin-right:20px; margin-bottom:15px"> 
  <i class="far fa-heart ml-auto " style="font-size:24px"></i>
  &nbsp;&nbsp;
  <i class="fab fa-facebook-f" style="font-size:24px"></i>
  &nbsp;&nbsp;
  <i class="fa fa-cart-plus" style="font-size:24px"></i>
  &nbsp;&nbsp;
  <i class="fas fa-home" style="font-size:24px"></i> 

</div>

</div>
<!--THANH LOGO - NEW - BRANDS ... -->
<nav class="navbar navbar-expand-md sticky-top" style="background-color:black;color:white" >
  <!--Brand-->
  <a class="navbar-brand" href="#" style="background-color:black;color:white">LOGO</a>

  <!-- Links-->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class ="nav-link" href="#">New</a>
    </li>
    <li class="nav-item">
      <a class ="nav-link" href="#">Brands</a>
    </li>
    
    <li class="nav-item">
      <a class ="nav-link" href="#">Contact</a>
    </li>
    <!--THANH THẢ XUỐNG-->
    <li class="nav-item dropdown">
      <a class ="nav-link dropdown-toggle" href="#" data-toggle="dropdown">About Beauty</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Fashion Trends</a>
        <a class="dropdown-item" href="#">Makeup Trends</a>
        <a class="dropdown-item" href="#">Skincare</a>
    </li>
  </ul>
  <form class="form-inline ml-auto" action="/action_page.php" align-items-end >
    <input class="form-control mr-sm-2"  type="text" placeholder="Search for something...">
    <button type="button" class="btn btn-danger" type="submit">Search</button>
    &nbsp;&nbsp;
   
  </form> 
</nav>

<hr>

<div class="container">
  <div class="row">

  <div class="col-sm-2">
  <br><br>
  <h5>Just arrived </h5><hr>
      
        <a href="#">Makeup</a><hr>
        <a  href="#">Skincare</a><hr>
        <a  href="#">Hair</a><hr>
        <a  href="#">Bath & Body</a><hr>
        <a href="#">Men</a>
    
  </div>
    <div class="col-sm-10">
<!--BĂNG CHUYỀN CAROUSEL-->
    <div id="bangchuyen" class="carousel slide" data-ride="carousel" style="width:100%; display:block; margin-right:auto;margin-left:auto">
  <!--căn giữa các hình trong băng chuyền để vừa trong 2 cái CONTROL-->
  <!--3 DẤU GẠCH -->
  <ul class="carousel-indicators">
    <li data-target="#bangchuyen" data-slide-to="0" class="active"></li>
    <li data-target="#bangchuyen" data-slide-to="1"></li>
  </ul>
  <!--THÊM HÌNH-->
  <div class="carousel-inner " >
    <div class="carousel-item active">
      <img src="horizon3.jpg" alt="" >
    </div>
    <div class="carousel-item">
      <img src="horizon1.jpg" alt="" >
    </div>
  </div>
  <!--MŨI TÊN CONTROL TRÁI PHẢI -->
  <a class="carousel-control-prev" href="#bangchuyen" data-slide="prev" >
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#bangchuyen" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
    
    </div>
    </div>

    </div>
<hr>
<!--DIV 2-->
<div class="marketing">
  <div class="row" align="center">
    <div class="col-lg-4">
      <img src="\assets\makeup.jpg" alt="" width="300" height="300">
      <h3>Makeup</h3>
      <p>Sephora is the paradisse if you're looking for best makeup</p>
    </div>

    <div class="col-lg-4">
    <img src="\assets\skincare.jpg" alt="" width="300" height="300">
    <h2>Skincare</h2>
    <p>Sephora maintains your natural beauty</p>
    </div>

    <div class="col-lg-4">
    <img src="\assets\hair.jpg" alt="" width="300" height="300">
    <h3>Hair Care</h3>
    <p>Sephora provides all you need to cleanse, style & treat any hair style</p>
    </div>
  
  </div>

</div>

<div class="thumbnails" style="text-align:center" >
<hr>
  <h3 >Tẩy trang</h3>
  <hr>
  <img src="senka.jpeg" alt="">
  <hr>
  <h3>Sữa rửa mặt</h3>
  
  <img src="senka1.jpeg" alt="">
  <hr>
  <h3>Chống lão hóa </h3>
  
  <img src="innisfree.jpeg" alt="">
  
</div>

<div class="footer" style="background-color:black;color:white;margin-top:10px; weight: 100%">
  <div class="row" align="center" >
    
    <div class="col-sm-6"> <br><br>
    <b>My Sephora</b> 
    <br><br>
    My Account <br>
    Delivery <br>
    Return <br>
    My Details
    </div>
  
    <div class="col-sm-6"> <br><br>
    <b>Ways to shop</b> 
    <br><br>
    Just Arrived <br>
    Bestsellers <br>
    Gift Cards <br>
    Store Location <br>
    Beauty Offers 
    </div>
  
  </div>
</div>
</body>
</html>
