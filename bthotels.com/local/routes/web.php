<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Tạo Superadmin
Route::get('taoSuperadmin','UserController@getTaoSuperadmin');
//Đăng nhập
Route::get('dangnhap','UserController@getDangnhap');
Route::post('dangnhap','UserController@postDangnhap');
Route::get('dangxuat','UserController@getDangxuat');
//Superadmin
Route::group(['prefix'=>'superadmin','middleware'=>'SuperAdmin'],function(){

	Route::get('/',function(){
		return view('superadmin.home');
	});
	Route::get('dangxuat','DangnhapController@getDangxuat');

	Route::group(['prefix'=>'goidv'],function(){

		Route::get('danhsach','GoidichvuController@getDanhsach');
		Route::get('sua/{id}','GoidichvuController@getSua');
		Route::post('sua/{id}','GoidichvuController@postSua');
		Route::get('them','GoidichvuController@getThem');
		Route::post('them','GoidichvuController@postThem');
		Route::get('xoa/{id}','GoidichvuController@getXoa');
	});

	Route::group(['prefix'=>'user'],function(){

		Route::get('danhsach','UserController@getDanhsachUser');
		Route::get('sua/{id}','UserController@getSuaUser');
		Route::post('sua/{id}','UserController@postSuaUser');
		Route::post('them','UserController@postThemUser');
		Route::get('doimatkhau/{id}','UserController@getDoimatkhau');
		Route::post('doimatkhau/{id}','UserController@postDoimatkhau');
	});

	Route::group(['prefix'=>'quyen'],function(){

		Route::get('danhsach','UserController@getDanhsachQuyen');
		Route::get('sua/{id}','UserController@getSuaQuyen');
		Route::post('sua/{id}','UserController@postSuaQuyen');
		Route::post('them','UserController@postThemQuyen');
	});

	Route::group(['prefix'=>'gdv'],function(){

		Route::get('danhsach','GoidichvuController@getDanhsachGdv');
		Route::get('sua/{id}','GoidichvuController@getSuaGdv');
		Route::post('sua/{id}','GoidichvuController@postSuaGdv');
		Route::post('them','GoidichvuController@postThemGdv');
		
	});
	Route::group(['prefix'=>'lnnks'],function(){

		Route::get('danhsach','NnksController@getDanhsachLoainnks');
		Route::get('sua/{id}','NnksController@getSuaLoainnks');
		Route::post('sua/{id}','NnksController@postSuaLoainnks');
		Route::post('them','NnksController@postThemLoainnks');
		
	});
	Route::group(['prefix'=>'hang'],function(){

		Route::get('danhsach','NnksController@getDanhsachHang');
		Route::get('sua/{id}','NnksController@getSuaHang');
		Route::post('sua/{id}','NnksController@postSuaHang');
		Route::post('them','NnksController@postThemHang');
		
	});
	Route::group(['prefix'=>'quoctich'],function(){

		Route::get('danhsach','NnksController@getDanhsachQtich');
		Route::get('sua/{id}','NnksController@getSuaQtich');
		Route::post('sua/{id}','NnksController@postSuaQtich');
		Route::post('them','NnksController@postThemQtich');
		
	});
	Route::group(['prefix'=>'ttp'],function(){

		Route::get('danhsach','DiadiemController@getDanhsachTtp');
		Route::get('sua/{id}','DiadiemController@getSuaTtp');
		Route::post('sua/{id}','DiadiemController@postSuaTtp');
		Route::post('them','DiadiemController@postThemTtp');
		
	});

	Route::group(['prefix'=>'quhuyen'],function(){

		Route::get('danhsach','DiadiemController@getDanhsachQuhuyen');
		Route::get('sua/{id}','DiadiemController@getSuaQuhuyen');
		Route::post('sua/{id}','DiadiemController@postSuaQuhuyen');
		Route::post('them','DiadiemController@postThemQuhuyen');
		
	});

	Route::group(['prefix'=>'phuongxa'],function(){

		Route::get('danhsach','DiadiemController@getDanhsachPhuongxa');
		Route::get('sua/{id}','DiadiemController@getSuaPhuongxa');
		Route::post('sua/{id}','DiadiemController@postSuaPhuongxa');
		Route::post('them','DiadiemController@postThemPhuongxa');
		Route::get('ajax/ttp_change/{id}','DiadiemController@getAjaxQuhuyen');
		
	});


	Route::group(['prefix'=>'kieuphong'],function(){

		Route::get('danhsach','PhongController@getDanhsachKieuphong');
		Route::get('sua/{id}','PhongController@getSuaKieuphong');
		Route::post('sua/{id}','PhongController@postSuaKieuphong');
		Route::post('them','PhongController@postThemKieuphong');
		
	});


});

//Quản lý nhà nghỉ - khách sạn
Route::group(['prefix'=>'quanly','middleware'=>'Quanly'],function(){

	Route::get('/',function(){
		return view('quanly.home');
	});

	Route::group(['prefix'=>'loaitbi'],function(){

		Route::get('danhsach','ThietbiController@getDanhsachLoaitbi');
		Route::get('sua/{id}','ThietbiController@getSuaLoaitbi');
		Route::post('sua/{id}','ThietbiController@postSuaLoaitbi');
		Route::post('them','ThietbiController@postThemLoaitbi');
		
	});
	Route::group(['prefix'=>'thietbi'],function(){

		Route::get('danhsach','ThietbiController@getDanhsachThietbi');
		Route::get('sua/{id}','ThietbiController@getSuaThietbi');
		Route::post('sua/{id}','ThietbiController@postSuaThietbi');
		Route::post('them','ThietbiController@postThemThietbi');
		
	});

	Route::group(['prefix'=>'loaiphong'],function(){

		Route::get('danhsach','PhongController@getDanhsachLoaiphong');
		Route::get('sua/{id}','PhongController@getSuaLoaiphong');
		Route::post('sua/{id}','PhongController@postSuaLoaiphong');
		Route::get('them','PhongController@getThemLoaiphong');
		Route::post('them','PhongController@postThemLoaiphong');
		
	});
	Route::group(['prefix'=>'giaphong'],function(){

		Route::get('danhsach','PhongController@getDanhsachGiaphong');
		Route::get('sua/{id_lp}/{id_kp}/{ngay}','PhongController@getSuaGiaphong');
		Route::post('sua/{id_lp}/{id_kp}/{ngay}','PhongController@postSuaGiaphong');
		Route::get('them','PhongController@getThemGiaphong');
		Route::post('them','PhongController@postThemGiaphong');
		Route::get('xoa/{id_lp}/{id_kp}/{ngay}','PhongController@getXoa');
		
	});
	Route::group(['prefix'=>'khuvuc'],function(){

		Route::get('danhsach','PhongController@getDanhsachKhuvuc');
		Route::get('sua/{id}','PhongController@getSuaKhuvuc');
		Route::post('sua/{id}','PhongController@postSuaKhuvuc');
		Route::get('them','PhongController@getThemKhuvuc');
		Route::post('them','PhongController@postThemKhuvuc');
		
	});
	Route::group(['prefix'=>'tang'],function(){

		Route::get('danhsach','PhongController@getDanhsachTang');
		Route::get('sua/{id}','PhongController@getSuaTang');
		Route::post('sua/{id}','PhongController@postSuaTang');
		Route::get('them','PhongController@getThemTang');
		Route::post('them','PhongController@postThemTang');
		
	});
	


});