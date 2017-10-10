@extends('layout_quanly.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row" >
      <div class="col-lg-12 col-center-block">
        <h1 class="page-header">Cập nhập thông tin thiết bị                
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
          <a href="quanly/thietbi/danhsach"><button class="btn btn-primary"><img width="25px;" src="img/ic_back.png"/> Quay lại danh sách</button></a>
        </div>


        <form id="form_update" action="{{ URL::to('quanly/thietbi/sua')}}/{{$thietbi->id_tb}}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label>Tên thiết bị</label>
            <input class="form-control" name="Tentb" value="{{$thietbi->ten_tb}}"  placeholder="Tên thiết bị"/>
          </div>
          <div class="form-group">
                <label>Tên loại thiết bị</label>
                <select class="form-control" name="Loaitb">
                  <option value="">---------</option>
                  @foreach ($loaitbi as $ltb)
                  <option value="{{$ltb->id_ltb}}"
                    @if($ltb->id_ltb == $thietbi->ma_ltb_tb) {{"selected"}} @endif>
                    {{$ltb->id_ltb}} - {{$ltb->ten_ltb}}
                  </option>
                  @endforeach
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

