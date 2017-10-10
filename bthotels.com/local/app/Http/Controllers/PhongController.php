<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Loaiphong;
use App\Phong;
use App\Ngay;
use App\Giaphong;
use App\Kieuphong;
use App\Khuvuc;
use App\Tang;

class PhongController extends Controller
{
    //Thông tin khu vực
    public function postThemKhuvuc(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'Ten'=>'required',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên khu vực',

            ]);

        if ($validator->passes()) {

            $kv = Khuvuc::where([['ma_nnks_kv',Auth::user()->ma_nnks_user],['ten',$request->Ten]])->get();
            if(count($kv) > 0)
            {
                $err[] = "Tên khu vực đã tồn tại, vui lòng xem lại";
                return response()->json(['error'=>$err]);
            }
            else
            {
                $khuvuc = new Khuvuc;
                $khuvuc->ten = $request->Ten;
                $khuvuc->dien_giai = $request->Diengiai;
                $khuvuc->ma_nnks_kv = Auth::user()->ma_nnks_user;

                //Lưu lại
                $khuvuc->save();

                return response()->json(['success'=>'Thêm khu vực thành công']);
            }
            
        }
        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function getDanhsachKhuvuc()
    {
        $khuvuc = Khuvuc::where('ma_nnks_kv',Auth::user()->ma_nnks_user)->get();
        return view('quanly.phong.khuvuc.danhsach',['khuvuc'=>$khuvuc]);
    }

    public function getSuaKhuvuc($id)
    {
        $khuvuc = Khuvuc::find($id);
        return view('quanly.phong.khuvuc.sua',['khuvuc'=>$khuvuc]);       

    }

    public function postSuaKhuvuc(Request $request,$id)
    {
        $this->validate($request,
            [
                'Ten'=>'required',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên khu vực',

            ]);


            $kv = Khuvuc::where([['ma_nnks_kv',Auth::user()->ma_nnks_user],['ten',$request->Ten]])->get();
            if(count($kv) > 0)
            {
                return redirect('quanly/khuvuc/sua/'.$id)->withErrors('Tên khu vực đã tồn tại, vui lòng xem lại!');
            }
            else
            {

                Khuvuc::where('id_kv',$id)->update(['ten' => $request->Ten,
                                            'dien_giai' => $request->Diengiai]);
            }

        return redirect('quanly/khuvuc/sua/'.$id)->with('thongbao','Cập nhật tên khu vực thành công!');

    }

    //Thông tin tầng

    //Thông tin phòng

    //Thông tin kiểu phòng
    public function postThemKieuphong(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'Songuoi'=>'required|unique:kieu_phong,so_nguoi|numeric|min:1',
                'Diengiai'=>'required'
            ],
            [
                'Songuoi.required' => 'Bạn chưa nhập số người',
                'Songuoi.unique' => 'Số người này đã tồn tại, vui lòng xem lại',
                'Songuoi.numeric' => 'Số người phải là số, vui lòng xem lại',
                'Songuoi.min' => 'Số người phải lớn hơn hoặc bằng 1',
                'Dongia.required' => 'Bạn chưa nhập diễn giải'
            ]);

        if ($validator->passes()) {

            $kieuphong = new Kieuphong;
            $kieuphong->so_nguoi = $request->Songuoi;
            $kieuphong->dien_giai = $request->Diengiai;

            //Lưu lại
            $kieuphong->save();

            return response()->json(['success'=>'Thêm kiểu phòng thành công']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function getDanhsachKieuphong()
    {
        $kieuphong = Kieuphong::all();
        return view('superadmin.kieuphong.danhsach',['kieuphong'=>$kieuphong]);
    }

    public function getSuaKieuphong($id)
    {
        $kieuphong = Kieuphong::find($id);
        return view('superadmin.kieuphong.sua',['kieuphong'=>$kieuphong]);       

    }

    public function postSuaKieuphong(Request $request,$id)
    {
        $this->validate($request,
            [
                'Songuoi'=>'required|unique:kieu_phong,so_nguoi,'.$id.',id_kp|numeric|min:1',
                'Diengiai'=>'required'
            ],
            [
                'Songuoi.required' => 'Bạn chưa nhập số người',
                'Songuoi.unique' => 'Số người này đã tồn tại, vui lòng xem lại',
                'Songuoi.numeric' => 'Số người phải là số, vui lòng xem lại',
                'Songuoi.min' => 'Số người phải lớn hơn hoặc bằng 1',
                'Diengiai.required' => 'Bạn chưa nhập đơn giá'
            ]);

        Kieuphong::where('id_kp',$id)->update(['so_nguoi' => $request->Songuoi,'dien_giai' => $request->Diengiai]);

        return redirect('superadmin/kieuphong/sua/'.$id)->with('thongbao','Cập nhật kiểu phòng thành công!');

    }

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
    public function postThemGiaphong(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'Loaiphong'=>'required',
                'Kieuphong'=>'required',
                'Ngayapdung'=>'required|date',
                'G_ngay'=>'required|numeric|min:1',
                'G_gbd'=>'required|numeric|min:1',
                'G_gtt'=>'required|numeric|min:1',
            ],
            [
                'Loaiphong.required' => 'Bạn chưa chọn loại phòng',
                'Kieuphong.required' => 'Bạn chưa chọn kiểu phòng',
                'Ngayapdung.required' => 'Bạn chưa nhập ngày áp dụng',
                'Ngayapdung.date' => 'Ngày áp dụng không đúng, vui lòng nhập lại',
                'G_ngay.required' => 'Bạn chưa nhập giá ngày',
                'G_ngay.numeric' => 'Giá ngày phải là số, vui lòng xem lại',
                'G_ngay.min' => 'Giá ngày phải lớn hơn hoặc bằng 1',
                'G_gbd.required' => 'Bạn chưa nhập giá giờ bắt đầu',
                'G_gbd.numeric' => 'Giá giờ bắt đầu phải là số, vui lòng xem lại',
                'G_gbd.min' => 'Giá giờ bắt đầu phải lớn hơn hoặc bằng 1',
                'G_gtt.required' => 'Bạn chưa nhập giá giờ tiếp theo',
                'G_gtt.numeric' => 'Giá giờ tiếp theo phải là số, vui lòng xem lại',
                'G_gtt.min' => 'Giá giờ tiếp theo phải lớn hơn hoặc bằng 1',
            ]);

        if ($validator->passes()) {

            $gp = Giaphong::where([['ma_lp',$request->Loaiphong],
                                    ['ma_kp',$request->Kieuphong],
                                    ['ngay_gp',$request->Ngayapdung]])
                                    ->get();
            if(count($gp) >0)
            {
                $err[] = 'Giá phòng này đã tồn tại, vui lòng xem lại';
                return response()->json(['error'=>$err]);
            }
            else
            {
                $giaphong = new Giaphong;
                $giaphong->ma_lp = $request->Loaiphong;
                $giaphong->ma_kp = $request->Kieuphong;
                $giaphong->ngay_gp = $request->Ngayapdung;
                $giaphong->gia_ngay = $request->G_ngay;
                $giaphong->gia_gio_bd = $request->G_gbd;
                $giaphong->gia_gio_tt = $request->G_gtt;


                $n = Ngay::find($request->Ngayapdung);
                if(count($n) == 0)
                {
                    $ngay = new Ngay;
                    $ngay->n_gay = $request->Ngayapdung;
                    $ngay->save();
                }

                //Lưu lại
                $giaphong->save();

                return response()->json(['success'=>'Thêm giá phòng thành công']);
            }
            
        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function getDanhsachGiaphong()
    {
        $kieuphong = Kieuphong::all();
        $loaiphong = Loaiphong::all();
        $giaphong = Giaphong::all();
;        return view('quanly.phong.giaphong.danhsach',['kieuphong'=>$kieuphong,'loaiphong'=>$loaiphong,'giaphong'=>$giaphong]);
    }

    public function getSuaGiaphong($id_lp,$id_kp,$ngay)
    {
        $giaphong = Giaphong::where([['ma_lp',$id_lp],['ma_kp',$id_kp],['ngay_gp',$ngay]])->get();
        $loaiphong = Loaiphong::all();
        $giaphong = Giaphong::all();
        return view('quanly.phong.giaphong.sua',['kieuphong'=>$kieuphong]);       

    }

    public function postSuaGiaphong(Request $request,$id_lp,$id_kp,$ngay)
    {
        $this->validate($request,
            [
                'G_ngay'=>'required|numeric|min:1',
                'G_gbd'=>'required|numeric|min:1',
                'G_gtt'=>'required|numeric|min:1',
            ],
            [
                'G_ngay.required' => 'Bạn chưa nhập giá ngày',
                'G_ngay.numeric' => 'Giá ngày phải là số, vui lòng xem lại',
                'G_ngay.min' => 'Giá ngày phải lớn hơn hoặc bằng 1',
                'G_gbd.required' => 'Bạn chưa nhập giá giờ bắt đầu',
                'G_gbd.numeric' => 'Giá giờ bắt đầu phải là số, vui lòng xem lại',
                'G_gbd.min' => 'Giá giờ bắt đầu phải lớn hơn hoặc bằng 1',
                'G_gtt.required' => 'Bạn chưa nhập giá giờ tiếp theo',
                'G_gtt.numeric' => 'Giá giờ tiếp theo phải là số, vui lòng xem lại',
                'G_gtt.min' => 'Giá giờ tiếp theo phải lớn hơn hoặc bằng 1',
            ]);

        Giaphong::where([['ma_lp',$id_lp],['ma_kp',$id_kp],['ngay_gp',$ngay]])
                ->update(['gia_ngay' => $request->G_ngay,
                        'gia_gio_bd' => $request->G_gbd,
                        'gia_gio_tt' => $request->G_gtt]);

        return redirect('quanly/giaphong/sua/'.$id)->with('thongbao','Cập nhật giá phòng thành công!');

    }
    public function getXoa($id_lp,$id_kp,$ngay)
    {
        $giaphong = Giaphong::where([['ma_lp',$id_lp],['ma_kp',$id_kp],['ngay_gp',$ngay]]);
        $giaphong->delete();

        return redirect('quanly/giaphong/danhsach')->with('thongbao','Xóa giá phòng thành công!');
    }

}
