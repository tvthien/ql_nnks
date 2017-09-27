<html>
<head>
<meta charset="utf-8">
	
	<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-3.3.7-dist/css/bootstrap.min.css')); ?>">
	<script language="javascript" src="<?php echo e(asset('js/jquery-1.12.4.js')); ?>"></script>
	<script src="<?php echo e(asset('js/js/layout.js')); ?>"></script>
	<script language="javascript" src="<?php echo e(asset('js/bootstrap-3.3.7-dist/js/bootstrap.min.js')); ?>"></script>

    <link href="<?php echo e(asset('css/styles.css" rel="stylesheet')); ?>">
	<style type="text/css">
		body {
			background: #fff;
			height: 100%;
			padding-bottom:140px;
		}
		.container{
			padding-top: 40px;
			height: 100%;
			min-height:100%;
			position:relative;
		}
		.footer{
			background: black;
			color:white;
			bottom:0;
			width: 100%;
            height: 140px;
            margin-top: 3px;
            float: left;
		}
		#myCarousel{
			position:relative;
		}
		.content{
                width: 100%;
                margin-top: 325px;
                background-color:azure;
                float: left;
				position:relative;
            }
			
		.dangnhap{
			margin-left:80%;
			margin-top:1%;
			width:20%;
		}
		#dropdown{
			background: #fff;
			color: #222;
		}
		.a-color{
			color: #fff;
		}
		
		.li1: hover{
			background: #fff;
			color: #000;
		}
		
		
	</style>
</head>

<body>
<div class="header">
	<div class="dangnhap">
	<button type="button" class="btn btn-primary">
		<span class="glyphicon glyphicon-plus"></span> Signup
	</button>
	<button type="button" class="btn btn-primary">
		<span class="glyphicon glyphicon-log-in"></span> Login
	</button>
	
	</div>
	
	<center>
				<img src="<?php echo e(asset('img/bthotels.png')); ?>" style="width: 30%; ">
	</center>
</div>   
 <div class="container">			
    		
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
                            <li><a href="#">Trang chủ</a></li>
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



  <div class="body">    
     <div class="content">
      <?php echo $__env->yieldContent('content'); ?>
	   </div>
  </div>
</div>  
     	<div class="footer">
        	<center>
            	<br/>
               	<a href=		'https://www.facebook.com/profile.php?id=100005177919707&fref=ts'>
								<img class="img-rounded" src="<?php echo e(asset('img/fb.jpg')); ?>" width="35" height="35"/>
				</a>
                &nbsp;&nbsp;
                <a href=		'#'>
								<img class="img-rounded" src="<?php echo e(asset('img/insta.png')); ?>" width="37" height="37"/>
				</a>
                &nbsp;&nbsp;
                <a href=		'#'>
								<img class="img-rounded" src="<?php echo e(asset('img/youtube.png')); ?>" width="37" height="37"/>
				</a>
            </center>
            <br/>
            <h5><marquee id="mqtext">ĐẶNG NHƯ BÁCH & TRẦN VĂN THIỆN</marquee></h5>
        </div>
   
</body>
</html>