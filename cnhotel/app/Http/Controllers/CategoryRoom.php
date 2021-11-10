<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryRoom extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        } else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_room(){
        $this->AuthLogin();
    	return view('admin.add_category_room');
    }
    public function all_category_room(){
        $this->AuthLogin();
    	$all_category_room = DB::table('tbl_category_room')->get();
    	$manager_category_room = view('admin.all_category_room')->with('all_category_room',$all_category_room);
    	return view('layout')->with('admin.all_category_room',$manager_category_room);
    }
    public function save_category_room(Request $request){
        $this->AuthLogin();
    	$data = array();
    	$data['category_name'] = $request->category_room_name;
    	$data['category_desc'] = $request->category_room_desc;
        $data['category_room_price'] = $request->category_room_price;
    	$data['category_status'] = $request->category_room_status;

    	DB::table('tbl_category_room')->insert($data);
    	Session::put('message','Thêm loại phòng thành công');
    	return Redirect::to('add-category-room');
    }
    public function unactive_category_room($category_room_id){
        $this->AuthLogin();
    	DB::table('tbl_category_room')->where('category_id',$category_room_id)->update(['category_status'=>1]);
    	Session::put('message','Hủy kích hoạt loại phòng thành công');
    	return Redirect::to('all-category-room');
    }
    public function active_category_room($category_room_id){
        $this->AuthLogin();
    	DB::table('tbl_category_room')->where('category_id',$category_room_id)->update(['category_status'=>0]);
    	Session::put('message','Kích hoạt loại phòng thành công');
    	return Redirect::to('all-category-room');
    }
    public function edit_category_room($category_room_id){
        $this->AuthLogin();
        $edit_category_room = DB::table('tbl_category_room')->where('category_id',$category_room_id)->get();
        $manager_category_room = view('admin.edit_category_room')->with('edit_category_room',$edit_category_room);
        return view('layout')->with('admin.edit_category_room',$manager_category_room);
    }
    public function update_category_room(Request $request, $category_room_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_room_name;
        $data['category_room_price'] = $request->category_room_price;
        $data['category_desc'] = $request->category_room_desc;
        DB::table('tbl_category_room')->where('category_id',$category_room_id)->update($data);
        Session::put('message','Cập nhật loại phòng thành công');
        return Redirect::to('all-category-room');
    }
    public function delete_category_room($category_room_id){
        $this->AuthLogin();
        DB::table('tbl_category_room')->where('category_id',$category_room_id)->delete();
        Session::put('message','Xóa loại phòng thành công');
        return Redirect::to('all-category-room');
    }

    //End Function Admin Page

    
}
