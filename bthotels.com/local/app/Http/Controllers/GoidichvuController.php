<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Chitietgdv;
use App\Goidv;

class GoidichvuController extends Controller
{
    //Thông tin gói dịch vụ
    public function postThemGdv(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'Tengoi'=>'required',
                'Thoihansd'=>'required|numeric|min:1'
            ],
            [
                'Tengoi.required' => 'Bạn chưa nhập tên gói dịch vụ',
                'Thoihansd.required' => 'Bạn chưa nhập thời hạn sử dụng',
                'Thoihansd.numeric' => 'Thời hạn sử dụng không đúng, vui lòng nhập lại',
                'Thoihansd.min' => 'Thời hạn sử dụng không đúng, vui lòng nhập lại',                

            ]);

        if ($validator->passes()) {

            $gdv = new Goidv;
            $gdv->ten_gdv = $request->Tengoi;
            $gdv->thoi_han_sd = $request->Thoihansd;

            //Lưu lại
            $gdv->save();

            return response()->json(['success'=>'Thêm gói dịch vụ thành công']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

	public function getDanhsachGdv()
    {
        $gdv = Goidv::all();
        return view('superadmin.gdv.danhsach',['gdv'=>$gdv]);
    }

    public function getSuaGdv($id)
    {
        $gdv = Goidv::find($id);
        return view('superadmin.gdv.sua',['gdv'=>$gdv]);       

    }

    public function postSuaGdv(Request $request,$id)
    {
        $this->validate($request,
            [
                'Tengoi'=>'required',
                'Thoihansd'=>'required|numeric|min:1'
            ],
            [
                'Tengoi.required' => 'Bạn chưa nhập tên gói dịch vụ',
                'Thoihansd.required' => 'Bạn chưa nhập thời hạn sử dụng',
                'Thoihansd.numeric' => 'Thời hạn sử dụng không đúng, vui lòng nhập lại',
                'Thoihansd.min' => 'Thời hạn sử dụng không đúng, vui lòng nhập lại',                

            ]);

        Goidv::where('id_gdv',$id)->update(['ten_gdv' => $request->Tengoi,
                            'thoi_han_sd'=>$request->Thoihansd]);

        return redirect('superadmin/gdv/sua/'.$id)->with('thongbao','Cập nhật thông tin gói dịch vụ thành công!');

    }
    //Thông tin chi tiết gói dịch vụ

    //Thông tin giá gói dịch vụ
}
