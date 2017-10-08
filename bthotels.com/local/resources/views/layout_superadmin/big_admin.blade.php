<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Quản lý nhà nghỉ - khách sạn</title>
<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<base href="{{asset('')}}">
<link href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

<link href="css/styles_admin.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>BTHOTELS</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>Bách<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="#">CHỨC NĂNG 1</a></li>
            
			<li><a href="#">CHỨC NĂNG 1</a></li>
            <li><a href="#">CHỨC NĂNG 1</a></li>
			<li><a href="#">CHỨC NĂNG 1</a></li>
           
			<li><a href="#">CHỨC NĂNG 1</a></li>
            
          	<li><a href="#">CHỨC NĂNG 1</a></li>
			<li role="presentation" class="divider"></li>
		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
				@if(count($errors)>0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $err)
						<span class="glyphicon glyphicon-remove"></span>
						{{$err}}<br>
						@endforeach
					</div>
                @endif			
				<form id="form_insert" action="{{ URL::to('Them')}}" method="POST" enctype="multipart/form-data">
					<!-- {{csrf_field()}} -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input class="form-control" id="hoten" name="ho_ten" placeholder="Họ và tên người dùng"/>
                    </div>
                    
                    <button type="submit" class="btn btn-default" style="background-color: #31b0d5; color: white; "><i class="glyphicon glyphicon-plus" ></i> Tạo người dùng</button>
                </form>
				<p> </p>
				<div id="ketqua" >
				</div>
	</div>	<!--/.main-->
</body>






</html>

<script type="text/javascript">

$.ajaxSetup({
	headers: {
	  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
  });

$('#form_insert').on('submit',function(e){
	
	e.preventDefault();
	var data = $(this).serialize();
	var url = $(this).attr('action');
	var post = $(this).attr('method');
	$.ajax({
		type : post,
		url : url,
		data : data,
		dataType : 'json',
		// success: function(data) {
	 //                if($.isEmptyObject(data.error)){
	 //                	alert(data.success);
	 //                }else{
	 //                	printErrorMsg(data.error);
	 //                }
	 //            }

		
		success:function(responses)
		{
			console.log(responses);
			if($.isEmptyObject(responses.error))
			{
				var messageHtml = '<div class="alert alert-success">';
				messageHtml += responses.success;
				messageHtml += '</div>';
	            $( '#ketqua' ).html( messageHtml);
	        }
	        else
	        {
	             printErrorMsg(responses.error);
	        }
		 }
	        });

	    }); 

		function printErrorMsg (responses)
		{
			var messageHtml = '<div class="alert alert-danger"><ul>';
			for (var key in responses) 
			{
			  	if (responses.hasOwnProperty(key)) 
			  	{
			    	var val = responses[key];
			    	
			    			messageHtml += '<li>' + val + '</li>'; 
						
			  	}
			}
			messageHtml += '</ul></div>';
	        $( '#ketqua' ).html( messageHtml );
		}
		
    
	
	

	
	

// $(document).ready(function()
// {  
//     //khai báo nút submit form
//     var submit   = $("button[type='submit']");
     
//     //khi thực hiện kích vào nút Login
//     submit.click(function()
//     {
//         //khai báo các biến
//         var hoten = $("input[name='Hoten']").val(); 
        
        
         
//         //lay tat ca du lieu trong form login
//         var data = $('form#form_login').serialize();
//         //su dung ham $.ajax()
//         $.ajax({
//         type : 'POST', //kiểu post
//         url  : '/test', //gửi dữ liệu sang trang submit.php
//         data : data,
//         success :  function(data)
//                {                       
                   
//                         $('#content').html(data);
                    
//                }
//         });
//         return false;
//     });
// });
</script>


