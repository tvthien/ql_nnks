<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Nnks;
use App\Loainnks;
use App\Hang;
use App\Quoctich;


class NnksController extends Controller
{
    //Thông tin nhà nghỉ - khách sạn

    //Thông tin loại nhà nghỉ - khách sạn
    public function postThemLoainnks(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'Tenloai'=>'required|unique:loai_nnks,ten',
            ],
            [
                'Tenloai.required' => 'Bạn chưa nhập tên loại nhà nghỉ - khách sạn',
                'Tenloai.unique' => 'Tên này đã tồn tại, vui lòng xem lại!'

            ]);

        if ($validator->passes()) {

            $lnnks = new Loainnks;
            $lnnks->ten = $request->Tenloai;

            //Lưu lại
            $lnnks->save();

            return response()->json(['success'=>'Thêm loại nhà nghỉ - khách sạn thành công']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function getDanhsachLoainnks()
    {
        $lnnks = Loainnks::all();
        return view('superadmin.nn_ks.loai_nnks.danhsach',['lnnks'=>$lnnks]);
    }

    public function getSuaLoainnks($id)
    {
        $lnnks = Loainnks::find($id);
        return view('superadmin.nn_ks.loai_nnks.sua',['lnnks'=>$lnnks]);       

    }

    public function postSuaLoainnks(Request $request,$id)
    {
        $this->validate($request,
            [
                'Tenloai'=>'required|unique:loai_nnks,ten,'.$id.',id_lnnks',
            ],
            [
                'Tenloai.required' => 'Bạn chưa nhập tên loại nhà nghỉ - khách sạn',
                'Tenloai.unique' => 'Tên này đã tồn tại, vui lòng xem lại!'

            ]);

        Loainnks::where('id_lnnks',$id)->update(['ten' => $request->Tenloai]);

        return redirect('superadmin/lnnks/sua/'.$id)->with('thongbao','Cập nhật loại nhà nghỉ - khách sạn thành công!');

    }

    //Thông tin hạng
    public function postThemHang(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'Tenhang'=>'required|unique:hang,h_ang|numeric',
            ],
            [
                'Tenhang.required' => 'Bạn chưa nhập tên hạng',
                'Tenhang.unique' => 'Hạng đã tồn tại, vui lòng xem lại!',
                'Tenhang.numeric' => 'Hạng không đúng, phải là số nguyên, vui lòng nhập lại!'

            ]);

        if ($validator->passes()) {

            $hang = new Hang;
            $hang->h_ang = $request->Tenhang;

            //Lưu lại
            $hang->save();

            return response()->json(['success'=>'Thêm hạng thành công']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function getDanhsachHang()
    {
        $hang = Hang::all();
        return view('superadmin.nn_ks.hang.danhsach',['hang'=>$hang]);
    }

    public function getSuaHang($id)
    {
        $hang = Hang::find($id);
        return view('superadmin.nn_ks.hang.sua',['hang'=>$hang]);       

    }

    public function postSuaHang(Request $request,$id)
    {
        $this->validate($request,
            [
                'Tenhang'=>'required|unique:hang,h_ang|numeric',
            ],
            [
                'Tenhang.required' => 'Bạn chưa nhập tên hạng',
                'Tenhang.unique' => 'Hạng đã tồn tại, vui lòng xem lại!',
                'Tenhang.numeric' => 'Hạng không đúng, phải là số nguyên, vui lòng nhập lại!'

            ]);

        Hang::where('h_ang',$id)->update(['h_ang' => $request->Tenhang]);

        return redirect('superadmin/hang/sua/'.$request->Tenhang)->with('thongbao','Cập nhật hạng thành công!');

    }

    //Thông tin quốc tịch
    public function postThemQtich(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'Ten'=>'required|unique:quoc_tich,ten',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên quốc tịch',
                'Ten.unique' => 'Tên quốc tịch đã tồn tại, vui lòng xem lại!',

            ]);

        if ($validator->passes()) {

            $quoctich = new Quoctich;
            $quoctich->ten = $request->Ten;

            //Lưu lại
            $quoctich->save();

            return response()->json(['success'=>'Thêm quốc tịch thành công']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function getDanhsachQtich()
    {
        $quoctich = Quoctich::all();
        return view('superadmin.quoctich.danhsach',['quoctich'=>$quoctich]);
    }

    public function getSuaQtich($id)
    {
        $quoctich = Quoctich::find($id);
        return view('superadmin.quoctich.sua',['quoctich'=>$quoctich]);       

    }

    public function postSuaQtich(Request $request,$id)
    {
        $this->validate($request,
            [
                'Ten'=>'required|unique:quoc_tich,ten',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên quốc tịch',
                'Ten.unique' => 'Tên quốc tịch đã tồn tại, vui lòng xem lại!',

            ]);

        Quoctich::where('id_qt',$id)->update(['ten' => $request->Ten]);

        return redirect('superadmin/quoctich/sua/'.$id)->with('thongbao','Cập nhật tên quốc tịch thành công!');

    }

    //Thông tin quảng cáo
}
