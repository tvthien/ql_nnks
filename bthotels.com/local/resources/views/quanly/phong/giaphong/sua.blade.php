@extends('layout_quanly.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row" >
      <div class="col-lg-12 col-center-block">
        <h1 class="page-header">Cập nhập thông tin loại phòng                
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
          <a href="quanly/giaphong/danhsach"><button class="btn btn-primary"><img width="25px;" src="img/ic_back.png"/> Quay lại danh sách</button></a>
        </div>
                       <!-- value="{{date('d-m-Y',strtotime($hoithao->ngay_bat_dau))}}"/> -->


        <form id="form_update" action="{{ URL::to('quanly/giaphong/sua')}}/{{$g->ma_lp}}/{{$g->ma_kp}}/{{$g->ngay_gp}}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                    <option value="{{$kp->id_kp}}">Số người: {{$kp->so_nguoi}}- Đơn giá: {{$kp->don_gia}}
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

