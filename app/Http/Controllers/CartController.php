<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;
class CartController extends Controller
{
    public function addgiohang (Request $request) {
    	$hidden_id = $request->hidden_id;
    	$soluong = $request->soluong;
    	$product_info = DB::table('tbl_product')->where('product_id',$hidden_id)->first();
    	$data = array();
    	$data['id'] = $product_info->product_id;
    	$data['qty'] = $soluong;
    	$data['name'] = $product_info->product_name;
    	$data['price'] = $product_info->product_price;
    	$data['weight'] = '0';
    	$data['options']['image'] = $product_info->product_image;
		Cart::add($data);
    	return Redirect::to('/showcart');
    }

    public function showcart () {
        $message = Session::get('customer_id');
        if ($message) {
            $cate_product = DB::table('tbl_category_product')->orderby('category_id')->get();
            $brand_product = DB::table('tbl_brand')->orderby('brand_id')->get();
            return view('pages.showcart')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        }
        else {
            Session::put('check_sign','Log in first');
           return Redirect::to('/login_checkout');
        }
    	
    }

    public function deletecart ($rowId) {
    	Cart::remove($rowId);
    	return Redirect::to('/showcart');
    }

     public function updatecart ($rowId, Request $request) {
    	Cart::update($rowId,$request->quantity);
    	return Redirect::to('/showcart');
    }
}

