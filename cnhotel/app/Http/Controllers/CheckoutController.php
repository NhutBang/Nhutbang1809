<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function all_book_room(){
    	$all_book_room = DB::table('tbl_book_room')->join('tbl_room','tbl_book_room.room_id','=','tbl_room.room_id')->join('tbl_category_room','tbl_room.category_id','=','tbl_category_room.category_id')->get();
    	return view ('admin.all_book_room')->with('all_book_room',$all_book_room);

    }
    public function checkout_room(Request $request){
    	$price = $request->price;
    	$data = array();
    	$data['room_id'] = $request->room_id;
    	$data['room_name'] = $request->room_name;
    	$data['room_category'] = $request->room_category;
    	$data['number_hours'] = $request->sogio;
		$data['customer_id']= $request->customer_id;
    	$data['total'] = $price;
    	if ($data['number_hours'] <= 12) {
    		$data['total'] = $price;
    	}else{
    		$data['total'] = $data['number_hours']/12 * $price;
    	}
    	DB::table('tbl_checkout')->insert($data);
    	DB::table('tbl_book_room')->where('room_id',$request->room_id)->delete();

    	return Redirect::to('/checkout/'.$request->room_id);
    }
    public function checkout($room_id){
    	$checkout_detail = DB::table('tbl_checkout')->where('room_id',$room_id)->orderby('checkout_id','desc')->get();
    	return view ('admin.checkout_detail')->with('checkout_detail',$checkout_detail);
    }

    
}
