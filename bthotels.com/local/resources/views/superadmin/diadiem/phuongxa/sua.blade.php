@extends('layout_superadmin.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row" >
      <div class="col-lg-12 col-center-block">
        <h1 class="page-header">Cập nhập Quận - Huyện            
        </h1>
        @if(count($errors)>0)
        <div class="alert alert-danger">
          @foreach($errors->all() as $err)
          <span class="glyphicon glyphicon-remove"></span>
          {{$err}}<br>
          @endforeach
        </div>
        @endif
        @if(session('thongbao'))
        <div class="alert alert-success">
          <span class=" glyphicon glyphicon-ok "></span>
          {{session('thongbao')}}
        </div>
        @endif
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-lg-11 col-center-block" style="padding-bottom:25px">
        <div class="form-group">
          <a href="superadmin/phuongxa/danhsach"><button class="btn btn-primary"><img width="25px;" src="img/ic_back.png"/> Quay lại danh sách</button></a>
        </div>


        <form id="form_update" action="{{ URL::to('superadmin/phuongxa/sua')}}/{{$px->id_px}}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label>Tên Phường Xã</label>
            <input class="form-control" name="TenPx" value="{{$px->ten}}"  placeholder="Tên Phường - Xã"/>
          </div>  
          <div class="form-group">
                <label>Tỉnh - Thành phố</label>
                <select class="form-control" name="Ttp" id="ttp">
                  <option value="">---------</option>
                  @foreach($ttp as $t)
                    <option @if($px->thuocquhuyen->ma_ttp == $t->id_ttp) {{"selected"}} @endif
                      value="{{$t->id_ttp}}">{{$t->id_ttp}} - {{$t->ten}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group" id="quanhuyen">
                <label>Quận - Huyện</label>
                <select class="form-control" name="Qh">
                  <option value="{{$px->ma_qh}}">{{$px->ma_qh}} - {{$px->thuocquhuyen->ten}}</option>                  
                </select>
              </div>
          <button type="submit" class="btn btn-default" style="background-color: #31b0d5; color: white; "><i class="glyphicon glyphicon-save" ></i> Lưu lại</button>
        </form>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.inside -->
@endsection
@section('script')
<script type="text/javascript">
  $("#ttp").change(function(){
        var ttp = $(this).val();
        if(ttp > 0)
        {
            $.get("superadmin/phuongxa/ajax/ttp_change/"+ttp, function(data){
                $("#quanhuyen").html(data);
            });
        }
    });
</script>
@endsection

