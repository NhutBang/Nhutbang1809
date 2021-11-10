<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class RoomController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        } else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_room(){
    	$this->AuthLogin();
    	$cate_room = DB::table('tbl_category_room')->orderby('category_id')->get();
    	return view('admin.add_room')->with('cate_room',$cate_room);

    }
    public function all_room(){
    	$this->AuthLogin();
    	$all_room = DB::table('tbl_room')->join('tbl_category_room','tbl_category_room.category_id','=','tbl_room.category_id')->orderby('room_name')->get();
    	$manager_room = view('admin.all_room')->with('all_room',$all_room);
    	return view('layout')->with('admin.all_room',$manager_room);
    }
    public function save_room(Request $request){
    	$this->AuthLogin();
    	$data = array();
    	$data['category_id'] = $request->cate_room;
    	$data['room_name'] = $request->room_name;
    	
    	$data['room_display'] = $request->room_display;
  
    	DB::table('tbl_room')->insert($data);
    	Session::put('message','Thêm phòng thành công');
    	return Redirect::to('add-room');
    }
    public function unactive_room($room_id){
    	$this->AuthLogin();
    	DB::table('tbl_room')->where('room_id',$room_id)->update(['room_display'=>1]);
    	Session::put('message','Hủy kích hoạt phòng thành công');
    	return Redirect::to('all-room');
    }
    public function active_room($room_id){
    	$this->AuthLogin();
    	DB::table('tbl_room')->where('room_id',$room_id)->update(['room_display'=>0]);
    	Session::put('message','Kích hoạt phòng thành công');
    	return Redirect::to('all-room');
    }
    public function edit_room($room_id){
    	$this->AuthLogin();
    	$cate_room = DB::table('tbl_category_room')->orderby('category_id')->get();
        $edit_room = DB::table('tbl_room')->where('room_id',$room_id)->get();
        $manager_room = view('admin.edit_room')->with('edit_room',$edit_room)->with('cate_room',$cate_room);
        return view('layout')->with('admin.edit_room',$manager_room);
    }
    public function update_room(Request $request, $room_id){
    	$this->AuthLogin();
        $data = array();
        $data['category_id'] = $request->cate_room;
    	$data['room_name'] = $request->room_name;
    	
    	$data['room_status'] = $request->room_status;
        
    	DB::table('tbl_room')->where('room_id',$room_id)->update($data);
    	Session::put('message','Sửa phòng thành công');
    	return Redirect::to('all-room');
    }
    public function delete_room($room_id){
    	$this->AuthLogin();
        DB::table('tbl_room')->where('room_id',$room_id)->delete();
        Session::put('message','Xóa phòng thành công');
        return Redirect::to('all-room');
    }

}
