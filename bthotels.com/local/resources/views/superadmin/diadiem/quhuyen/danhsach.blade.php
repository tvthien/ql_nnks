@extends('layout_superadmin.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Danh sách quận huyện
        </h1>
      </div>
      <!-- /.col-lg-12 -->

      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr align="center">
            <th>ID</th>
            <th>Tên quận-huyện</th>
            <th>Tên tỉnh-thành phố</th>
            <th>Chỉnh sửa</th>
          </tr>
        </thead>
        <tbody>
          @foreach($qh as $q)
          <tr class="odd gradeX" align="center">
            <td>{{$q->id_qh}}</td>
            <td>{{$q->ten}}</td>
            <td>{{$q->thuocttp->id_ttp}} - {{$q->thuocttp->ten}}</td>
            <td><a href="superadmin/quhuyen/sua/{{$q->id_qh}}"<p data-placement="top" data-toggle="tooltip" title="Edit"><button id="btnSua" class="btn btn-primary btn-xs"  data-title="Edit" data-toggle="modal" data-target="#sua_qh" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.row -->
    <!-- Trigger the modal with a button -->
    <button data-toggle="modal" data-target="#them_qh" class="btn btn-primary btn-md">Thêm Quận - Huyện</button>

    <!-- Form thêm User -->
    <div class="modal fade" id="them_qh" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="false" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="lineModalLabel">Thêm Quận - Huyện</h3>
          </div>
          <div class="modal-body">

            <!-- content goes here -->
            <form id="form_insert" action="{{ URL::to('superadmin/quhuyen/them')}}" method="POST" enctype="multipart/form-data">
              <div id="ketqua" >
              </div>
              <div class="form-group">
                <label>Tên Quận - Huyện</label>
                <input class="form-control" name="TenQh"  placeholder="Tên quận - huyện"/>
              </div>
              <div class="form-group">
                <label>Tỉnh - Thành phố</label>
                <select class="form-control" name="Ttp" >
                  <option value="">---------</option>
                  @foreach($ttp as $t)
                    <option value="{{$t->id_ttp}}">{{$t->id_ttp}} - {{$t->ten}}</option>
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
    $('#them_qh').modal('hide');
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

</script>
@endsection
