@extends('layout_superadmin.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Người dùng trong hệ thống
        </h1>
      </div>
      <!-- /.col-lg-12 -->

      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr align="center">
            <th>ID</th>
            <th>Tên người dùng</th>
            <th>Quyền</th>
            <th>Nhà nghỉ-khách sạn</th>
            <th>Người tạo</th>
            <th>Ngày tạo</th>
            <th>Chỉnh sửa</th>
          </tr>
        </thead>
        <tbody>
          @foreach($user as $us)
          <tr class="odd gradeX" align="center">
            <td>{{$us->id_user}}</td>
            <td>{{$us->ho_ten}}</td>
            <td>{{$us->coquyen->ten}}</td>

            @if(empty($us->thuocnnks->ten_nnks)) <td></td>
            @else <td>{{$us->thuocnnks->ten_nnks}}</td> @endif

            <td>{{$us->nguoitao->ho_ten}}</td>
            <td>{{date('d-m-Y H:i:s',strtotime($us->ngay_gio_tao))}}</td>
            <td><a href="superadmin/user/sua/{{$us->id_user}}"<p data-placement="top" data-toggle="tooltip" title="Edit"><button id="btnSua" class="btn btn-primary btn-xs"  data-title="Edit" data-toggle="modal" data-target="#sua_user" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.row -->
      <!-- Trigger the modal with a button -->
      <button data-toggle="modal" data-target="#them_user" class="btn btn-primary btn-md">Thêm User</button>

      <!-- Form thêm User -->
      <div class="modal fade" id="them_user" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="false" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="lineModalLabel">Thêm User</h3>
            </div>
            <div class="modal-body">

              <!-- content goes here -->
              <form id="form_insert" action="{{ URL::to('superadmin/user/them')}}" method="POST" enctype="multipart/form-data">
                <div id="ketqua" >
                </div>
                <div class="form-group">
                  <label>Mã tài khoản</label>
                  <input class="form-control" name="Id" maxlength="8" placeholder="Mã tài khoản"/>
                </div>
                <div class="form-group">
                  <label>Tên người dùng</label>
                  <input class="form-control" name="Hoten"  placeholder="Tên người dùng"/>
                </div>
                <div class="form-group">
                  <label>Mật khẩu</label>
                  <input type="password" class="form-control" name="Password" placeholder="Mật khẩu">
                </div>
                <div class="form-group">
                  <label>Nhập lại mật khẩu</label>
                  <input type="password" class="form-control" name="RePassword" placeholder="Nhập lại mật khẩu">
                </div>
                <div class="form-group">
                  <label>Cấp quyền</label>
                  <select class="form-control" name="Quyen">
                    <option value="">-------------</option>
                    @foreach($quyen as $q)
                    <option value="{{$q->id_quyen}}">{{$q->ten}} -- {{$q->dien_giai}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Thuộc nhà nghỉ - khách sạn</label>
                  <select class="form-control" name="Nnks">
                    <option value="">-------------</option>
                    @foreach($nnks as $n)
                    <option value="{{$n->id_quyen}}">{{$n->ten_nnks}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Nhân viên</label>
                  <select class="form-control" name="Nhanvien">
                    <option value="">-------------</option>
                    @foreach($nhanvien as $nv)
                    <option value="{{$nv->id_nv}}">{{$nv->ten_nv}}</option>
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
    $('#them_user').modal('hide');
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
