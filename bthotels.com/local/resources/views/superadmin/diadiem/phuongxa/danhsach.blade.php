@extends('layout_superadmin.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Danh sách phường xã
        </h1>
      </div>
      <!-- /.col-lg-12 -->

      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr align="center">
            <th>ID</th>
            <th>Tên phường-xã</th>
            <th>Tên quận-huyện</th>
            <th>Tên tỉnh-thành phố</th>
            <th>Chỉnh sửa</th>
          </tr>
        </thead>
        <tbody>
          @foreach($px as $p)
          <tr class="odd gradeX" align="center">
            <td>{{$p->id_px}}</td>
            <td>{{$p->ten}}</td>
            <td>{{$p->thuocquhuyen->id_qh}} - {{$p->thuocquhuyen->ten}}</td>
            <td>{{$p->thuocquhuyen->thuocttp->id_ttp}} - {{$p->thuocquhuyen->thuocttp->ten}}</td>
            <td><a href="superadmin/phuongxa/sua/{{$p->id_px}}"<p data-placement="top" data-toggle="tooltip" title="Edit"><button id="btnSua" class="btn btn-primary btn-xs"  data-title="Edit" data-toggle="modal" data-target="#sua_px" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.row -->
    <!-- Trigger the modal with a button -->
    <button data-toggle="modal" data-target="#them_px" class="btn btn-primary btn-md">Thêm Phường - Xã</button>

    <!-- Form thêm User -->
    <div class="modal fade" id="them_px" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="false" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="lineModalLabel">Thêm Phường - Xã</h3>
          </div>
          <div class="modal-body">

            <!-- content goes here -->
            <form id="form_insert" action="{{ URL::to('superadmin/phuongxa/them')}}" method="POST" enctype="multipart/form-data">
              <div id="ketqua" >
              </div>
              <div class="form-group">
                <label>Tên Phường - Xã</label>
                <input class="form-control" name="TenPx"  placeholder="Tên phường - xã"/>
              </div>
              <div class="form-group">
                <label>Tỉnh - Thành phố</label>
                <select class="form-control" name="Ttp" id="ttp">
                  <option value="">---------</option>
                  @foreach($ttp as $t)
                    <option value="{{$t->id_ttp}}">{{$t->id_ttp}} - {{$t->ten}}</option>
                    @endforeach
                </select>
              </div>              
              <div id ="quanhuyen" class="form-group">
                
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
    $('#them_px').modal('hide');
  });

  $("#ttp").change(function(){
        var ttp = $(this).val();
        if(ttp > 0)
        {
            $.get("superadmin/phuongxa/ajax/ttp_change/"+ttp, function(data){
                $("#quanhuyen").html(data);
            });
        }
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
