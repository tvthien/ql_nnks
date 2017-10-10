@extends('layout_quanly.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Danh sách thiết bị
        </h1>
      </div>
      <!-- /.col-lg-12 -->

      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr align="center">
            <th>ID</th>
            <th>Tên thiết bị</th>
            <th>Tên loại thiết bị</th>
            <th>Chỉnh sửa</th>
          </tr>
        </thead>
        <tbody>
          @foreach($thietbi as $t)
          <tr class="odd gradeX" align="center">
            <td>{{$t->id_tb}}</td>
            <td>{{$t->ten_tb}}</td>
            <td>{{$t->thuocloaitbi->ten_ltb}}</td>
            <td><a href="quanly/thietbi/sua/{{$t->id_tb}}"<p data-placement="top" data-toggle="tooltip" title="Edit"><button id="btnSua" class="btn btn-primary btn-xs"  data-title="Edit" data-toggle="modal" data-target="#sua_tbi" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.row -->
    <!-- Trigger the modal with a button -->
    <button data-toggle="modal" data-target="#them_thietbi" class="btn btn-primary btn-md">Thêm Thiết bị</button>

    <!-- Form thêm User -->
    <div class="modal fade" id="them_thietbi" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="false" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="lineModalLabel">Thêm Thiết bị</h3>
          </div>
          <div class="modal-body">

            <!-- content goes here -->
            <form id="form_insert" action="{{ URL::to('quanly/thietbi/them')}}" method="POST" enctype="multipart/form-data">
              <div id="ketqua" >
              </div>
              <div class="form-group">
                <label>Tên thiết bị</label>
                <input class="form-control" name="Tentb"  placeholder="Tên thiết bị"/>
              </div>
              <div class="form-group">
                <label>Tên loại thiết bị</label>
                <select class="form-control" name="Loaitb">
                  <option value="">---------</option>
                  @foreach ($loaitbi as $ltb)
                  <option value="{{$ltb->id_ltb}}">{{$ltb->id_ltb}} - {{$ltb->ten_ltb}}</option>
                  @endforeach
                </select>
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
    $('#them_thietbi').modal('hide');
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
