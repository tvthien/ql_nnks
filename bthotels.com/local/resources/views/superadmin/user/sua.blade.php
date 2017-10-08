@extends('layout_superadmin.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row" >
      <div class="col-lg-12 col-center-block">
        <h1 class="page-header">Cập nhật thông tin người dùng                
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
          <a href="superadmin/user/danhsach"><button class="btn btn-primary"><img width="25px;" src="img/ic_back.png"/> Quay lại danh sách</button></a>
          <a href="superadmin/user/doimatkhau/{{$user->id_user}}"><button class="btn btn-primary"><img width="25px;" src=""/> Đổi mật khẩu</button></a>
        </div>

        <div id="ketqua"> </div>

        <form id="form_update" action="{{ URL::to('superadmin/user/sua')}}/{{$user->id_user}}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label>Mã tài khoản</label>
            <input class="form-control" name="Id" value="{{$user->id_user}}" maxlength="8"  placeholder="Mã tài khoản"/>
          </div>
          <div class="form-group">
            <label>Họ tên người dùng</label>
            <input class="form-control" name="Hoten" value="{{$user->ho_ten}}"  placeholder="Tên người dùng"/>
          </div>
          <div class="form-group">
            <label>Cấp quyền</label>
            <select class="form-control" name="Quyen">
              <option value="">-------------</option>
              @foreach($quyen as $q)
              <option value="{{$q->id_quyen}}"
               @if($q->id_quyen == $user->ma_quyen_user) {{"selected"}} @endif
               >{{$q->ten}} -- {{$q->dien_giai}}
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
