<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tinhtp;
use App\Quanhuyen;
use App\Phuongxa;
use DB; 

class DiadiemController extends Controller
{
    //Thông tin tỉnh thành phố
    public function postThemTtp(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'TenTtp'=>'required|unique:tinh_tp,ten',
            ],
            [
                'TenTtp.required' => 'Bạn chưa nhập tên tỉnh - thành phố',
                'TenTtp.unique' => 'Tên tỉnh thành phố đã tồn tại, vui lòng xem lại!'

            ]);

        if ($validator->passes()) {

            $ttp = new Tinhtp;
            $ttp->ten= $request->TenTtp;

            //Lưu lại
            $ttp->save();

            return response()->json(['success'=>'Thêm tỉnh - thành phố thành công']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function getDanhsachTtp()
    {
        $ttp = Tinhtp::all();
        return view('superadmin.diadiem.ttp.danhsach',['ttp'=>$ttp]);
    }

    public function getSuaTtp($id)
    {
        $ttp = Tinhtp::find($id);
        return view('superadmin.diadiem.ttp.sua',['ttp'=>$ttp]);       

    }

    public function postSuaTtp(Request $request,$id)
    {
        $this->validate($request,
            [
                'TenTtp'=>'required|unique:tinh_tp,ten,'.$id.',id_ttp',
            ],
            [
                'TenTtp.required' => 'Bạn chưa nhập tên tỉnh - thành phố',
                'TenTtp.unique' => 'Tên tỉnh thành phố đã tồn tại, vui lòng xem lại!'

            ]);

        Tinhtp::where('id_ttp',$id)->update(['ten' => $request->TenTtp]);

        return redirect('superadmin/ttp/sua/'.$id)->with('thongbao','Cập nhật tên tỉnh - thành phố thành công!');

    }

    //Thông tin quận huyện
    public function postThemQuhuyen(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'TenQh'=>'required',
            ],
            [
                'TenQh.required' => 'Bạn chưa nhập tên quận - huyện',

            ]);


        if ($validator->passes()) {

        	$ttp_qh = Quanhuyen::where([['ten',$request->TenQh],['ma_ttp',$request->Ttp]])->get();

        	$str[] = 'Dữ liệu đã tồn tại, vui lòng xem lại';
        	if(count($ttp_qh) > 0) 
        		return response()->json(['error'=>$str]);

        	else 
        	{
	            $qh = new Quanhuyen;
	            $qh->ten = $request->TenQh;
	            $qh->ma_ttp = $request->Ttp;
	            //Lưu lại
	            $qh->save();

        	}

            return response()->json(['success'=>'Thêm quận - huyện thành công']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function getDanhsachQuhuyen()
    {
    	$ttp = Tinhtp::all();
        $qh = Quanhuyen::all();
        return view('superadmin.diadiem.quhuyen.danhsach',['qh'=>$qh,'ttp'=>$ttp]);
    }

    public function getSuaQuhuyen($id)
    {
        $ttp = Tinhtp::all();
        $qh = Quanhuyen::find($id);
        return view('superadmin.diadiem.quhuyen.sua',['ttp'=>$ttp,'qh'=>$qh]);       

    }

    public function postSuaQuhuyen(Request $request,$id)
    {
        $this->validate($request,
            [
                'TenQh'=>'required',
            ],
            [
                'TenQh.required' => 'Bạn chưa nhập tên quận - huyện',

            ]);


        $ttp_qh = Quanhuyen::where([['ten',$request->TenQh],['ma_ttp',$request->Ttp]])->get();

        if(count($ttp_qh) > 0) 
        	return redirect('superadmin/quhuyen/sua/'.$id)->withErrors('Dữ liệu đã tồn tại, vui lòng xem lại!');

        else 
        {
        	Quanhuyen::where('id_qh',$id)->update(['ten' => $request->TenQh, 
        							'ma_ttp' => $request->Ttp]);

        	return redirect('superadmin/quhuyen/sua/'.$id)->with('thongbao','Cập nhật quận - huyện thành công!');
        }

    }    

    //Thông tin phường xã
    public function postThemPhuongxa(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'TenPx'=>'required',
            ],
            [
                'TenPx.required' => 'Bạn chưa nhập tên phường - xã',

            ]);


        if ($validator->passes()) {

        	$qh_px = Phuongxa::where([['ten',$request->TenPx],['ma_qh',$request->Qh]])->get();

        	$str[] = 'Dữ liệu đã tồn tại, vui lòng xem lại';
        	if(count($qh_px) > 0) 
        		return response()->json(['error'=>$str]);

        	else 
        	{
	            $px = new Phuongxa;
	            $px->ten = $request->TenPx;
	            $px->ma_qh = $request->Qh;
	            //Lưu lại
	            $px->save();

        	}

            return response()->json(['success'=>'Thêm phường - xã thành công']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function getDanhsachPhuongxa()
    {
    	$ttp = Tinhtp::all();
        $qh = Quanhuyen::all();
        $px = Phuongxa::all();
        return view('superadmin.diadiem.phuongxa.danhsach',['qh'=>$qh,'ttp'=>$ttp,'px'=>$px]);
    }
    public function getAjaxQuhuyen($id)
    {
        $qh = Quanhuyen::where('ma_ttp',$id)->get();
        echo   '<label>Quận - Huyện</label>
                <select class="form-control" name="Qh">
                  <option value="">---------</option>';
                  foreach($qh as $q) {
                  echo '  <option value="'.$q->id_qh.'">'.$q->id_qh.' - '.$q->ten.'</option>';          
                  }
                echo '</select>';
                
    }

    public function getSuaPhuongxa($id)
    {
        $ttp = Tinhtp::all();
        $qh = Quanhuyen::all();
        $px = Phuongxa::find($id);
        return view('superadmin.diadiem.phuongxa.sua',['ttp'=>$ttp,'qh'=>$qh,'px'=>$px]);       

    }


    public function postSuaPhuongxa(Request $request,$id)
    {
        $this->validate($request,
            [
                'TenPx'=>'required',
                'Qh'=>'required',
                'Ttp'=>'required',
            ],
            [
                'TenPx.required' => 'Bạn chưa nhập tên phường - xã',
                'Qh.required' => 'Bạn chưa chọn quận - huyện',
                'Ttp.required' => 'Bạn chưa chọn quận - huyện',

            ]);


        $dia_diem = DB::table('tinh_tp')->join('quan_huyen', 'tinh_tp.id_ttp', '=', 'quan_huyen.ma_ttp')
                ->join('phuong_xa', 'phuong_xa.ma_qh', '=', 'quan_huyen.id_qh')
                ->where('phuong_xa.ten','=',$request->TenPx)
                ->where('quan_huyen.id_qh','=',$request->Qh)
                ->where('tinh_tp.id_ttp','=',$request->Ttp)
                ->get();

        if(count($dia_diem) > 0) 
        	return redirect('superadmin/phuongxa/sua/'.$id)->withErrors('Dữ liệu đã tồn tại, vui lòng xem lại!');

        else 
        {
        	Phuongxa::where('id_px',$id)->update(['ten' => $request->TenPx, 
        							'ma_qh' => $request->Qh]);

        	return redirect('superadmin/phuongxa/sua/'.$id)->with('thongbao','Cập nhật phường - xã thành công!');
        }

    }   
}
