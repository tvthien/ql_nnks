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
          <a href="superadmin/quhuyen/danhsach"><button class="btn btn-primary"><img width="25px;" src="img/ic_back.png"/> Quay lại danh sách</button></a>
        </div>


        <form id="form_update" action="{{ URL::to('superadmin/quhuyen/sua')}}/{{$qh->id_qh}}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label>Tên Quận - Huyện</label>
            <input class="form-control" name="TenQh" value="{{$qh->ten}}"  placeholder="Tên Quận - Huyện"/>
          </div>  
          <div class="form-group">
                <label>Tỉnh - Thành phố</label>
                <select class="form-control" name="Ttp">
                  <option value="">---------</option>
                  @foreach($ttp as $t)
                    <option @if($qh->ma_ttp == $t->id_ttp) {{"selected"}} @endif
                      value="{{$t->id_ttp}}">{{$t->id_ttp}} - {{$t->ten}}</option>
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

