<?php

namespace App\Http\Controllers;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function login_checkout () {
    	$cate_product = DB::table('tbl_category_product')->orderby('category_id')->get();
    	$brand_product = DB::table('tbl_brand')->orderby('brand_id')->get();
    	return view('pages.logincheckout')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }

    public function signup (Request $request) {
    	$data = array();
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_email'] = $request->customer_email;
    	$data['customer_phone'] = $request->customer_phone;
    	$data['customer_password'] = md5($request->customer_password);

    	//echo '<pre>';
    	//print_r($data);
    	//echo '</pre>';
    	$customer_id = DB::table('tbl_customer')->insertgetid($data);
    	$customer_name = $request->customer_name;

    	Session::put('customer_name',$customer_name);
    	Session::put('customer_id',$customer_id);

    	return Redirect('showcheckout');
    }

    public function login (Request $request) {
    	$customer_email = $request->customer_email;
    	$customer_password = md5($request->customer_password);
    	$result = DB::table('tbl_customer')->where('customer_email', $customer_email)->where('customer_password',$customer_password)->first();
    	if ($result) {
    		Session::put('customer_name',$result->customer_name);
    		Session::put('customer_id',$result->customer_id);
    		return Redirect('/showcheckout');
    	}
    	else {
    	    $message = "Wrong Email/Password";
    		Session::put('check_sign','Wrong E-mail/Password');
    		return redirect()->back();
    	}
    }

    public function showcheckout () {
        $message = Session::get('customer_id');
        if ($message) {
           $cate_product = DB::table('tbl_category_product')->orderby('category_id')->get();
            $brand_product = DB::table('tbl_brand')->orderby('brand_id')->get();
            return view('pages.checkout')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        }

    	else {
            Session::put('check_sign','Log in first');
            return Redirect::to('/login_checkout');
        }
    }
}
