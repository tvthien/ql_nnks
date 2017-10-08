<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Loaiphong;

class PhongController extends Controller
{
    //Thông tin khu vực

    //Thông tin tầng

    //Thông tin phòng

    //Thông tin kiểu phòng

    //Thông tin loại phòng
	public function postThemLoaiphong(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'Ten'=>'required|unique:loai_phong,ten_lp',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên loại phòng',
                'Ten.unique' => 'Tên loại phòng này đã tồn tại, vui lòng xem lại',

            ]);

        if ($validator->passes()) {

            $loaiphong = new Loaiphong;
            $loaiphong->ten_lp = $request->Ten;
            $loaiphong->mo_ta_lp = $request->Mota;
			$loaiphong->ma_nnks_lp = Auth::user()->ma_nnks_user;

            //Lưu lại
            $loaiphong->save();

            return response()->json(['success'=>'Thêm loại phòng thành công']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function getDanhsachLoaiphong()
    {
        $loaiphong = Loaiphong::all();
        return view('quanly.phong.loaiphong.danhsach',['loaiphong'=>$loaiphong]);
    }

    public function getSuaLoaiphong($id)
    {
        $loaiphong = Loaiphong::find($id);
        return view('quanly.phong.loaiphong.sua',['loaiphong'=>$loaiphong]);       

    }

    public function postSuaLoaiphong(Request $request,$id)
    {
        $this->validate($request,
            [
                'Ten'=>'required|unique:loai_phong,ten_lp,'.$id.',id_lp',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên loại phòng',
                'Ten.unique' => 'Tên loại phòng này đã tồn tại, vui lòng xem lại',

            ]);

        Loaiphong::where('id_lp',$id)->update(['ten_lp' => $request->Ten,'mo_ta_lp' => $request->Mota]);

        return redirect('quanly/loaiphong/sua/'.$id)->with('thongbao','Cập nhật tên loại phòng thành công!');

    }
    //Thông tin giá phòng

}
