@extends('layout_quanly.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Danh sách tầng
        </h1>
        @if(session('thongbao'))
        <div class="alert alert-success">
          <span class=" glyphicon glyphicon-ok "></span>
          {{session('thongbao')}}
        </div>
        @endif
      </div>
      <!-- /.col-lg-12 -->

      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr align="center">
            <th>STT</th>
            <th>Tên khu vực</th>
            <th>Diễn giải</th>
            <th>Chỉnh sửa</th>
            <!-- <th>Xóa</th> -->
          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
          @foreach($khuvuc as $k)
          <tr class="odd gradeX" align="center">
            <td>{{$i}}</td> <?php $i++; ?>
            <td>{{$k->ten}}</td>
            <td>{{$k->dien_giai}}</td>
            <td><a href="quanly/khuvuc/sua/{{$k->id_kv}}"<p data-placement="top" data-toggle="tooltip" title="Edit"><button id="btnSua" class="btn btn-primary btn-xs"  data-title="Edit" data-toggle="modal" data-target="#sua_khuvuc" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>

              <!-- <td><a id="del" href="quanly/giaphong/xoa/"><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></a></td> -->
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.row -->
    <!-- Trigger the modal with a button -->
    <button data-toggle="modal" data-target="#them_khuvuc" class="btn btn-primary btn-md">Thêm Khu vực</button>

    <!-- Form thêm User -->
    <div class="modal fade" id="them_khuvuc" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="false" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="lineModalLabel">Thêm Khu vực</h3>
          </div>
          <div class="modal-body">

            <!-- content goes here -->
            <form id="form_insert" action="{{ URL::to('quanly/khuvuc/them')}}" method="POST" enctype="multipart/form-data">
              <div id="ketqua" >
              </div>
              <div class="form-group">
                <label>Tên khu vực</label>
                <input class="form-control" name="Ten"  placeholder="Tên khu vực"/>
              </div>
              <div class="form-group">
                <label>Diễn giải</label>
                <input class="form-control" name="Diengiai"  placeholder="Diễn giải khu vực"/>
              </div>
               <button type="submit" class="btn btn-info">Lưu lại</button>
            </form>      

          </div>
          <div class="modal-footer">
            <button type="button" id="btnClose_them" class="btn btn-default btn-hover-green" data-action="close" role="button">Đóng</button>
          </div>
        </div>
      </div>
    </div>

    
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<!--//content-->




@endsection

@section('script')
<script type="text/javascript">

  $('#btnClose_them').click(function(){
    $('#them_khuvuc').modal('hide');
  });

//Submit form Create with ajax

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

</script>
@endsection
