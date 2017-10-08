<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Loaithbi;
use App\Thietbi;
use App\Lp_thbi;
use App\Trangbi;

class ThietbiController extends Controller
{
    //Thông tin loại thiết bị
    public function postThemLoaitbi(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'Ten'=>'required|unique:loai_tbi,ten_ltb',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên loại thiết bị',
                'Ten.unique' => 'Tên loại thiết bị này đã tồn tại, vui lòng xem lại',

            ]);

        if ($validator->passes()) {

            $loaitbi = new Loaithbi;
            $loaitbi->ten_ltb = $request->Ten;
			$loaitbi->ma_nnks_ltb = Auth::user()->ma_nnks_user;

            //Lưu lại
            $loaitbi->save();

            return response()->json(['success'=>'Thêm loại thiết bị thành công']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function getDanhsachLoaitbi()
    {
        $loaitbi = Loaithbi::all();
        return view('quanly.thietbi.loaitbi.danhsach',['loaitbi'=>$loaitbi]);
    }

    public function getSuaLoaitbi($id)
    {
        $loaitbi = Loaithbi::find($id);
        return view('quanly.thietbi.loaitbi.sua',['loaitbi'=>$loaitbi]);       

    }

    public function postSuaLoaitbi(Request $request,$id)
    {
        $this->validate($request,
            [
                'Ten'=>'required|unique:loai_tbi,ten_ltb',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên loại thiết bị',
                'Ten.unique' => 'Tên loại thiết bị này đã tồn tại, vui lòng xem lại',

            ]);

        Loaithbi::where('id_ltb',$id)->update(['ten_ltb' => $request->Ten]);

        return redirect('quanly/loaitbi/sua/'.$id)->with('thongbao','Cập nhật tên loại thiết bị thành công!');

    }
    //Thông tin thiết bị

    //Thông tin trang bị

    //Thông tin loại phòng - loại thiết bị
}
