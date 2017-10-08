<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Quản lý</title>
    <base href="{{asset('')}}">
    <link href="css/bootstrap3.3.7.min.css" rel="stylesheet">
    <script src="js/jquery3.2.1.min.js"></script>
    <script src="js/bootstrap3.3.7.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <!-- <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- MetisMenu CSS -->
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        @include('layout_quanly.header')

        @yield('content')

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <!-- <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


    
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap-datepicker.js"></script>  
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
    </script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    $('.datepicker').datepicker({  
           format: 'yyyy-mm-dd'  
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

    $('#del').click(function(){
    return confirm("Bạn có chắc chắn muốn xóa?");
    });
    </script>


    @yield('script')
</body>

</html>
