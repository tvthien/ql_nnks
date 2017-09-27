<html>
<head>
  <meta charset="utf-8">
  <title>Quản lý nhà nghỉ - khách sạn</title>

  <base href="<?php echo e(asset('')); ?>">
  <link href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/styles_bootstrap.css" rel="stylesheet">
  <link href="css/styles_index.css" rel="stylesheet">
  <script language="javascript" src="js/jquery-1.12.4.js"></script>
  <script language="javascript" src="js/js/layout.js"></script>
  <script language="javascript" src="js/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>


</head>

<body>
  <?php echo $__env->make('layout_home.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="container">

    <?php echo $__env->make('layout_home.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="body">    
     <div class="content">
      <?php echo $__env->yieldContent('content'); ?>
    </div>
  </div>
</div>  

<?php echo $__env->make('layout_home.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>     	

</body>
</html>