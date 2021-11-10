<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CustomerController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        } else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_customer(){
        
    	return view('admin.add_customer');
    }
    public function all_customer(){
        $this->AuthLogin();
    	$all_customer = DB::table('tbl_customer')->get();
    	$manager_customer = view('admin.all_customer')->with('all_customer',$all_customer);
    	return view('layout')->with('admin.all_customer',$manager_customer);
    }
    public function save_customer(Request $request){
        
    	$data = array();
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_sex'] = $request->customer_sex;
    	$data['customer_birth'] = $request->customer_birth;
    	$data['customer_phone'] = $request->customer_phone;
    	$data['customer_address'] = $request->customer_address;
    	$data['customer_idNo'] = $request->customer_idNo;

    	DB::table('tbl_customer')->insert($data);
    	Session::put('message','Thêm khách hàng thành công');
    	return Redirect::to('add-customer');
    }
    public function edit_customer($customer_id){
        $this->AuthLogin();
        $edit_customer = DB::table('tbl_customer')->where('customer_id',$customer_id)->get();
        $manager_customer = view('admin.edit_customer')->with('edit_customer',$edit_customer);
        return view('layout')->with('admin.edit_customer',$manager_customer);
    }
    public function update_customer(Request $request, $customer_id){
        $this->AuthLogin();
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_sex'] = $request->customer_sex;
        $data['customer_birth'] = $request->customer_birth;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_address'] = $request->customer_address;
        $data['customer_idNo'] = $request->customer_idNo;

        DB::table('tbl_customer')->where('customer_id',$customer_id)->update($data);
        Session::put('message','Cập nhật khách hàng thành công');
        return Redirect::to('all-customer');
    }
    public function delete_customer($customer_id){
        $this->AuthLogin();
        DB::table('tbl_customer')->where('customer_id',$customer_id)->delete();
        Session::put('message','Xóa khách hàng thành công');
        return Redirect::to('all-customer');
    }

    // Book room
    public function book_room(Request $request, $customer_id){
        $select_cate_room = DB::table('tbl_category_room')->get();
        return view ('admin.selected_category')->with('select_cate_room',$select_cate_room)->with('customer_id',$customer_id);

   }

   public function selected_room(Request $request){
        $customer_id = $request->customer_id;
        $category_id = $request->category_room;
        $room_list = DB::table('tbl_room')->where('category_id',$category_id)->where('room_status','Trống')->get();
        
        return view ('admin.selected_room')->with('room_list',$room_list)->with('customer_id',$customer_id);
   }
  

   public function save_book_room(Request $request){
        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['room_id'] = $request->room_id;
        DB::table('tbl_book_room')->insert($data);
        Session::put('message','Đặt phòng thành công');
        return Redirect::to('all-customer');
   }
}
