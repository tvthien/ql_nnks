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
          <a href="quanly/loaiphong/danhsach"><button class="btn btn-primary"><img width="25px;" src="img/ic_back.png"/> Quay lại danh sách</button></a>
        </div>


        <form id="form_update" action="{{ URL::to('quanly/loaiphong/sua')}}/{{$loaiphong->id_lp}}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label>Tên loại phòng</label>
            <input class="form-control" name="Ten" value="{{$loaiphong->ten_lp}}"  placeholder="Tên loại phòng"/>
          </div>
          <div class="form-group">
            <label>Mô tả loại phòng</label>
            <input class="form-control" name="Mota" value="{{$loaiphong->mo_ta_lp}}"  placeholder="Mô tả loại phòng"/>
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

