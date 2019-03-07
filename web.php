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


Route::get('demo',['as'=>'getDemo', 'uses'=>'DemoController@getDemo']);
Route::post('demo',['as'=>'postDemo', 'uses'=>'DemoController@postDemo']);






Route::get('timkiem', ['as'=>'getSearch', 'uses'=>'ClientController@searchProduct']);

Route::get('/', ['as' => 'getIndex', 'uses' => 'ClientController@getIndex']);

Route::get('sanpham', ['as'=>'getAllProducts', 'uses'=>'ClientController@getAllProducts']);

Route::get('theloai', ['as'=>'getAllGernes', 'uses'=>'ClientController@getAllGernes']);

Route::get('nxb', ['as'=>'getAllPublishers', 'uses'=>'ClientController@getAllPublishers']);

Route::get('tacgia', ['as'=>'getAllAuthors', 'uses'=>'ClientController@getAllAuthors']);

Route::get('theloai/{matl}/{alias}', ['as'=>'getProductsbyGerne', 'uses'=>'ClientController@getProductsbyGerne']);

Route::get('tacgia/{matg}/{alias}', ['as'=>'getProductsbyAuthor', 'uses'=>'ClientController@getProductsbyAuthor']);

Route::get('nxb/{manxb}/{alias}', ['as'=>'getProductsbyPublisher', 'uses'=>'ClientController@getProductsbyPublisher']);

Route::get('/product/detail/{masp}/{alias}', ['as' => 'getProductDetails', 'uses' => 'ClientController@getProductDetails']);

Route::get('register', ['as' => 'getRegister', 'uses' => 'ClientController@getRegister']);
Route::post('register', ['as' => 'postRegister', 'uses' => 'ClientController@postRegister']);

Route::get('login', ['as' => 'getLogin', 'uses' => 'ClientController@getLogin']);
Route::post('login', ['as' => 'postLogin', 'uses' => 'ClientController@postLogin']);

Route::get('logout', ['as' => 'getLogout', 'uses' => 'ClientController@getLogout']);
Route::get('themgiohang/{id}/{tensanpham}',['as'=>'themgiohang','uses'=>'ClientController@themgiohang']);
Route::get('giohang',['as'=>'giohang','uses'=>'ClientController@giohang']);
Route::get('xoagiohang/{id}',['as'=>'xoagiohang','uses'=>'ClientController@xoagiohang']);
Route::get('capnhatgiohang/{id}',['as'=>'capnhatgiohang','uses'=>'ClientController@capnhatgiohang']);

Route::get('checkout', ['as' => 'getCheckout', 'uses' => 'ClientController@getCheckout'] );
Route::post('checkout', ['as' => 'postCheckout', 'uses' => 'ClientController@postCheckout'] );

Route::get('donhang/{idkh}', ['as'=>'getDonHang', 'uses'=>'ClientController@getDonHangs']);

Route::get('/admin', function () {
    return view('admin.master');
});

Route::get('themdiachi', ['as' => 'getThemdiachi', 'uses' => 'ClientController@getThemdiachi']);
Route::post('themdiachi', ['as' => 'postThemdiachi', 'uses' => 'ClientController@postThemdiachi']);

Route::get('suadiachi/{id}', ['as' => 'getSuadiachi', 'uses' => 'ClientController@getSuadiachi']);
Route::post('suadiachi/{id}', ['as' => 'postSuadiachi', 'uses' => 'ClientController@postSuadiachi']);

Route::get('admin/register', ['as' => 'getAdminRegister', 'uses' => 'AdminController@getRegister']);
Route::post('admin/register', ['as' => 'postAdminRegister', 'uses' => 'AdminController@postRegister']);
Route::get('admin/login', ['as' => 'getAdminLogin', 'uses' => 'AdminController@getLogin']);
Route::post('admin/login', ['as' => 'postAdminLogin', 'uses' => 'AdminController@postLogin']);
Route::get('admin/logout', ['as' => 'getAdminLogout', 'uses' => 'AdminController@getLogout']);

Route::group(['prefix'=>'admin','middleware'=>'checkAdminLogin'],function(){

		Route::get('/', ['as' => 'getAdminIndex', 'uses' => 'AdminController@getIndex']);

		/* The Loai */
		Route::get('theloai', ['as' => 'indexTheLoai', 'uses' => 'TheLoaiController@getTheLoais']);

		Route::post('theloai/add', ['as' => 'postAddTheLoai', 'uses' => 'TheLoaiController@addTheLoai']);
		Route::get('theloai/add', ['as' => 'getAddTheLoai', function(){ return view ('admin.theloai.add');}]);

		Route::post('theloai/edit/{matl}', ['as' => 'postEditTheLoai', 'uses' => 'TheLoaiController@editTheLoai']);
		Route::get('theloai/edit/{matl}/{alias}', ['as' => 'getEditTheLoai', 'uses' => 'TheLoaiController@getTheLoai']);

		Route::get('theloai/delete/{matl}', ['as' => 'deleteTheLoai', 'uses' => 'TheLoaiController@deleteTheLoai']);

		/* Tac Gia */
		Route::get('tacgia', ['as' => 'indexTacGia', 'uses' => 'TacGiaController@getTacGias']);

		Route::post('tacgia/add', ['as' => 'postAddTacGia', 'uses' => 'TacGiaController@addTacGia']);
		Route::get('tacgia/add', ['as' => 'getAddTacGia', function(){ return view ('admin.tacgia.add');}]);

		Route::post('tacgia/edit/{matg}', ['as' => 'postEditTacGia', 'uses' => 'TacGiaController@editTacGia']);
		Route::get('tacgia/edit/{matg}/{alias}', ['as' => 'getEditTacGia', 'uses' => 'TacGiaController@getTacGia']);

		Route::get('tacgia/delete/{matg}', ['as' => 'deleteTacGia', 'uses' => 'TacGiaController@deleteTacGia']);

		/* NXB */
		Route::get('nxb', ['as' => 'indexNXB', 'uses' => 'NXBController@getNXBs']);

		Route::post('nxb/add', ['as' => 'postAddNXB', 'uses' => 'NXBController@addNXB']);
		Route::get('nxb/add', ['as' => 'getAddNXB', function(){ return view ('admin.nxb.add');}]);

		Route::post('nxb/edit/{manxb}', ['as' => 'postEditNXB', 'uses' => 'NXBController@editNXB']);
		Route::get('nxb/edit/{manxb}/{alias}', ['as' => 'getEditNXB', 'uses' => 'NXBController@getNXB']);

		Route::get('nxb/delete/{manxb}', ['as' => 'deleteNXB', 'uses' => 'NXBController@deleteNXB']);

		/* San Pham*/
		Route::get('sanpham', ['as' => 'indexSanPham', 'uses' => 'SanPhamController@getSanPhams']);

		Route::post('sanpham/add', ['as' => 'postAddSanPham', 'uses' => 'SanPhamController@addSanPham']);
		Route::get('sanpham/add', ['as' => 'getAddSanPham', 'uses' => 'SanPhamController@getInfos']);

		Route::post('sanpham/edit/{masp}', ['as' => 'postEditSanPham', 'uses' => 'SanPhamController@editSanPham']);
		Route::get('sanpham/edit/{masp}/{alias}', ['as' => 'getEditSanPham', 'uses' => 'SanPhamController@getSanPham']);

		Route::get('sanpham/delete/{masp}', ['as' => 'getDeleteSanPham', 'uses'=>'SanPhamController@deleteSanPham']);


		/* Khach Hang */
		Route::get('khachhang', ['as' => 'indexKhachHang', 'uses' => 'KhachHangController@getKhachHangs']);


		/* Phi Ship */
		Route::get('phiship', function(){
			return view('admin.phiship.config');

		});
				/* HTTT */
		Route::get('hinhthucthanhtoan', ['as' => 'indexHinhThucThanhToan', 'uses' => 'HinhThucThanhToanController@getHinhThucThanhToans']);

		/* HTTT */
		Route::get('hinhthucthanhtoan', ['as' => 'indexHinhThucThanhToan', 'uses' => 'HinhThucThanhToanController@getHinhThucThanhToans']);

		/*Route::post('admin/hinhthucthanhtoan/add', ['as' => 'postAddHinhThucThanhToan', 'uses' => 'HinhThucThanhToanController@addHinhThucThanhToan']);
		Route::get('admin/hinhthucthanhtoan/add', ['as' => 'getAddHinhThucThanhToan', function(){ return view ('admin.hinhthucthanhtoan.add');}]);*/
	});
		/* Don Hang */
		Route::resource('dh','DonHangController');





