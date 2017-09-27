
<nav class="navbar navbar-inverse">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

  </div>

  <div class="navbar-collapse collapse" id="menu">
    <ul class="nav navbar-nav">
      <li><a href="#" id="home">Trang chủ</a></li>
      <li><a href="#">Giới thiệu</a></li>
      <li class="dropdown" >
        <a data-toggle="dropdown" href="">Thương hiệu<span class="caret"></span></a>
        <ul class="dropdown-menu" id="dropdown">
          <li class="li1"><a class="a-color" href="">Audi</a></li>
          <li class="li1"><a class="a-color" href="">BMW</a></li>
          <li class="li1"><a class="a-color" href="">Honda</a></li>
          <li class="li1"><a class="a-color" href="">Toyota</a></li>
          <li class="li1"><a class="a-color" href="">Thoát</a></li>
        </ul>
      </li>
      <li><a href="#">Hình ảnh</a></li>
      <li><a href="#">Liên hệ</a></li>

    </ul>             
  </div>
</nav>



<div id="myCarousel" class="carousel slide" data-ride="carousel">
 <!-- Indicators -->
 <ol class="carousel-indicators">
   <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
   <li data-target="#myCarousel" data-slide-to="1"></li>
   <li data-target="#myCarousel" data-slide-to="2"></li>
   <li data-target="#myCarousel" data-slide-to="3"></li>
 </ol>

 <!-- Wrapper for slides --><center>
  <div class="carousel-inner" role="listbox">

   <div class="item active">
     <img src="<?php echo e(asset('img/hotel1.jpg')); ?>" class="img-rounded" alt="Chania" width="1000px" height="300px">
   </div>

   <div class="item">
     <img src="<?php echo e(asset('img/hotel2.jpg')); ?>" class="img-rounded" alt="Chania" width="1000px" height="300px">
   </div>

   <div class="item">
     <img src="<?php echo e(asset('img/hotel3.jpg')); ?>" class="img-rounded" alt="Chania" width="1000px" height="300px">
   </div>

   <div class="item">
     <img src="<?php echo e(asset('img/hotel4.jpg')); ?>" class="img-rounded" alt="Chania" width="1000px" height="300px">
   </div>

 </div>
</center>
<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>