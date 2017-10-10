@extends('layout_quanly.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Danh sách giá phòng
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
            <th>Loại phòng</th>
            <th>Kiểu phòng</th>
            <th>Ngày áp dụng</th>
            <th>Giá ngày</th>
            <th>Giá giờ bắt đầu</th>
            <th>Giá giờ tiếp theo</th>
            <th>Chỉnh sửa</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
          @foreach($giaphong as $g)
          <tr class="odd gradeX" align="center">
            <td>{{$i}}</td> <?php $i++; ?>
            <td>{{$g->loaiphong->ten_lp}}</td>
            <td>{{$g->kieuphong->dien_giai}}</td>
            <td>{{$g->ngay_gp}}</td>
            <td>{{$g->gia_ngay}}</td>
            <td>{{$g->gia_gio_bd}}</td>
            <td>{{$g->gia_gio_tt}}</td>
            <td><a href="quanly/giaphong/sua/{{$g->ma_lp}}/{{$g->ma_kp}}/{{$g->ngay_gp}}"<p data-placement="top" data-toggle="tooltip" title="Edit"><button id="btnSua" class="btn btn-primary btn-xs"  data-title="Edit" data-toggle="modal" data-target="#sua_giaphong" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>

              <td><a id="del" href="quanly/giaphong/xoa/{{$g->ma_lp}}/{{$g->ma_kp}}/{{$g->ngay_gp}}"><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.row -->
    <!-- Trigger the modal with a button -->
    <button data-toggle="modal" data-target="#them_giaphong" class="btn btn-primary btn-md">Thêm Giá phòng</button>

    <!-- Form thêm User -->
    <div class="modal fade" id="them_giaphong" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="false" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="lineModalLabel">Thêm Giá phòng</h3>
          </div>
          <div class="modal-body">

            <!-- content goes here -->
            <form id="form_insert" action="{{ URL::to('quanly/giaphong/them')}}" method="POST" enctype="multipart/form-data">
              <div id="ketqua" >
              </div>
              <div class="form-group">
                <label>Loại phòng</label>
                <select class="form-control" name="Loaiphong">
                  <option value="">---------</option>
                  @foreach($loaiphong as $lp)
                  <option value="{{$lp->id_lp}}">{{$lp->ten_lp}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Kiểu phòng</label>
                <select class="form-control" name="Kieuphong">
                  <option value="">---------</option>
                  @foreach($kieuphong as $kp)
                    <option value="{{$kp->id_kp}}">Số người: {{$kp->so_nguoi}} - Kiểu phòng: {{$kp->dien_giai}}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group" >
                  <label>Ngày áp dụng</label>
                  <div class='input-group date'>
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                      <input type="text" class="form-control datepicker" runat="server" name="Ngayapdung"/>
                  </div>                     
              </div>
              <div class="form-group">
                <label>Giá ngày</label>
                <input class="form-control" name="G_ngay"  placeholder="Giá ngày"/>
              </div>
              <div class="form-group">
                <label>Giá giờ bắt đầu</label>
                <input class="form-control" name="G_gbd"  placeholder="Giá giờ bắt đầu"/>
              </div>
              <div class="form-group">
                <label>Giá giờ tiếp theo</label>
                <input class="form-control" name="G_gtt"  placeholder="Giá giờ tiếp theo"/>
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
    $('#them_giaphong').modal('hide');
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
