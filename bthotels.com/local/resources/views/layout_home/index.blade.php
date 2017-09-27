<html>
<head>
  <meta charset="utf-8">
  <title>Quản lý nhà nghỉ - khách sạn</title>

  <base href="{{asset('')}}">
  <link href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/styles_bootstrap.css" rel="stylesheet">
  <link href="css/styles_index.css" rel="stylesheet">
  <script language="javascript" src="js/jquery-1.12.4.js"></script>
  <script language="javascript" src="js/js/layout.js"></script>
  <script language="javascript" src="js/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>


</head>

<body>
  @include('layout_home.header')

  <div class="container">

    @include('layout_home.menu')

    <div class="body">    
     <div class="content">
      @yield('content')
    </div>
  </div>
</div>  

@include('layout_home.footer')     	

</body>
</html>