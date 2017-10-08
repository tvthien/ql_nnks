<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Quyen;
use App\Nnks;
use App\Nhanvien;

class UserController extends Controller
{    
    //Đăng nhập
    public function getDangnhap()
    {
        return view('dangnhap');
    }

    public function postDangnhap(Request $request)
    {
        $this->validate($request,
            [
                'Matk'=> 'required',
                'Matkhau' => 'required'
            ],
            [
                'Matk.required'=> 'Bạn chưa nhập mã tài khoản',
                'Matkhau.required'=> 'Bạn chưa nhập mật khẩu'
            ]);
        
        
        $user = User::where('id_user',$request->Matk)->first();
        if(!empty($user) ) 
        {
            Auth::login($user);
            if($user->ma_quyen_user == 1)
                return redirect('superadmin');
            else if($user->ma_quyen_user == 2)
                return redirect('quanly');
        }
        else
        {
            return redirect('dangnhap')->with('thongbao','Đăng nhập không thành công');
        }
    }

    public function getDangxuat()
    {
        Auth::logout();
        return redirect('dangnhap');
    }

    public function getTaoSuperadmin()
    {
        $user = new User;
        $user->id_user = 'superad';
        $user->ma_quyen_user= 1;
        $user->ho_ten = 'Superadmin';
        $user->password =  bcrypt('admin');
        $user->nguoi_tao = 'admin';
        $user->ngay_gio_tao = date('Y-m-d H:i:s');

        //Lưu lại
        $user->save();
    }
        
    //Thông tin quyền
    public function postThemQuyen(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'Ten'=>'required|unique:quyen,ten',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên quyền',
                'Ten.unique' => 'Tên quyền này đã tồn tại, vui lòng xem lại',

            ]);

        if ($validator->passes()) {

            $quyen = new Quyen;
            $quyen->ten= $request->Ten;

            //Diễn giải
            if($request->Diengiai == '')
            {
                $quyen->dien_giai= 0; 
            }
            else $quyen->dien_giai= $request->Diengiai;

            //Lưu lại
            $quyen->save();

            return response()->json(['success'=>'Thêm quyền thành công']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function getDanhsachQuyen()
    {
        $quyen = Quyen::all();
        return view('superadmin.quyen.danhsach',['quyen'=>$quyen]);
    }

    public function getSuaQuyen($id)
    {
        $quyen = Quyen::find($id);
        return view('superadmin.quyen.sua',['quyen'=>$quyen]);       

    }

    public function postSuaQuyen(Request $request,$id)
    {
        $this->validate($request,
            [
                'Ten'=>'required',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên quyền',

            ]);

        Quyen::where('id_quyen',$id)->update(['ten' => $request->Ten,
                            'dien_giai'=>$request->Diengiai]);

        return redirect('superadmin/quyen/sua/'.$id)->with('thongbao','Cập nhật quyền thành công!');

    }


    //Thông tin tài khoản
    public function postThemUser(Request $request)
    {
    	$validator = Validator::make($request->all(),
    		[
                'Id'=>'required|between:8,8|unique:users,id_user',
                'Hoten'=>'required',
                'Password'=>'required|min:3',
                'RePassword'=>'required|same:Password',
                'Quyen'=>'required',
    		],
    		[
                'Id.required' => 'Bạn chưa nhập mã tài khoản',
                'Id.between'  => 'Mã tài khoản phải đủ 8 ký tự',
                'Id.unique' => 'Mã tài khoản đã tồn tại, vui lòng xem lại',
    			'Quyen.required' => 'Bạn chưa cấp quyền cho người dùng này',
                'Hoten.required' => 'Bạn chưa nhập họ tên',
                'Password.required' => 'Bạn chưa nhập mật khẩu',
                'Password.min' => 'Mật khẩu không ít hơn 3 ký tự',
                'RePassword.required' => 'Bạn chưa nhập lại mật khẩu',
                'RePassword.same' => 'Mật khẩu nhập lại không đúng'

    		]);

        if ($validator->passes()) {

            $user = new User;
            $user->id_user = $request->Id;
            $user->ma_quyen_user= $request->Quyen;
            $user->ho_ten = $request->Hoten;
            $user->password =  bcrypt($request->Password);
            $user->nguoi_tao = Auth::user()->id_user;
            $user->ngay_gio_tao = date('Y-m-d H:i:s');

            //Thêm mã khách sạn
            if($request->Nnks == '')
            {
                $user->ma_nnks_user= 0; 
            }
            else $user->ma_nnks_user= $request->Nnks;

            //Thêm mã nhân viên
            if($request->Nvien == '')
            {
                $user->ma_nv_user= 0; 
            }
            else $user->ma_nv_user= $request->Nvien;
            //Lưu lại
            $user->save();

            return response()->json(['success'=>'Tạo tài khoản thành công']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

    	
    }

    public function getDanhsachUser()
    {
        $user = User::all();
        $quyen = Quyen::all();
        $nhanvien = Nhanvien::all();
        $nnks = Nnks::all();
        return view('superadmin.user.danhsach',['user'=>$user,'quyen'=>$quyen,'nhanvien'=>$nhanvien,'nnks'=>$nnks]);
    }

    public function getSuaUser($id)
    {
        $user = User::find($id);
        $quyen = Quyen::all();
        return view('superadmin.user.sua',['user'=>$user,'quyen'=>$quyen]);       

    }

    public function postSuaUser(Request $request,$id)
    {
        $this->validate($request,
            [
                'Id'=>'required|between:8,8|unique:users,id_user,'.$id.',id_user',
                'Hoten'=>'required',
                'Quyen'=>'required'
            ],
            [
                'Id.required' => 'Bạn chưa nhập mã tài khoản',
                'Id.between'  => 'Mã tài khoản phải đủ 8 ký tự',
                'Id.unique' => 'Mã tài khoản đã tồn tại, vui lòng xem lại',
                'Quyen.required' => 'Bạn chưa cấp quyền cho người dùng này',
                'Hoten.required' => 'Bạn chưa nhập họ tên',

            ]);

        User::where('id_user',$id)->update(['id_user'=>$request->Id,
                            'ma_quyen_user' => $request->Quyen,
                            'ho_ten'=>$request->Hoten]);

        return redirect('superadmin/user/sua/'.$request->Id)->with('thongbao','Cập nhật thông tin tài khoản thành công!');
        
    }


    public function getDoimatkhau($id)
    {
        $user = User::find($id);
        return view('superadmin.user.doimatkhau',['user'=>$user]);       

    }

    public function postDoimatkhau(Request $request,$id)
    {
        $this->validate($request,
            [
                'Password'=>'required|min:3',
                'RePassword'=>'required|same:Password'
            ],
            [
                'Password.required' => 'Bạn chưa nhập mật khẩu',
                'Password.min' => 'Mật khẩu không ít hơn 3 ký tự',
                'RePassword.required' => 'Bạn chưa nhập lại mật khẩu',
                'RePassword.same' => 'Mật khẩu nhập lại không đúng'

            ]);

            User::where('id_user',$id)->update(['password'=>bcrypt($request->Password)]);

        return redirect('superadmin/user/doimatkhau/'.$id)->with('thongbao','Đổi mật khẩu thành công!');
    }


    

}
