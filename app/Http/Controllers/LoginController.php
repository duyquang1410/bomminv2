<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
     	if(Auth::check())
     	{
     		return redirect()->route('dashbroad.index');
     	}
     	else
     	{
     		return view('layout.Login.adminLogin');
     	}
    }

    public function getLogout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    	if(Auth::logout())
    	{
    		toastr()->success('Thoát thành công', 'Thành công');
    		return redirect()->route('login');
    	}
    	else
    	{
    		toastr()->warning('Chưa Thoát thành công', 'Cảnh báo');
    		return back();
    	}
    }

    /* author : quangnd
    *  Action: Đăng nhập dành cho quản trị viên 
    */

     public function adminLogin()
    {
        if(Auth::check())
        {
            return redirect()->route('dashbroad.index');
        }
        else
        {
            return view('layout.Login.adminLogin');
        }
    }

     public function postAdminLogin(Request $request)
    {
        $return = array();
        $login =[
            "username"  => $request->username,
            "password"  => $request->password,
        ];

        if(empty($request->username)){
           $return['msg_user'] = "Bạn cần nhập tên đăng nhập";
        }
        else {
            $return['msg_user'] = 0;
        }
         if(empty($request->password)){
           $return['msg_pass'] = "Bạn cần nhập mật khẩu";
        }
        else {
            $return['msg_pass'] = 0;
        }
        if(empty($request->username) || empty($request->password)){
            $return['message'] = "warning";
            return response()->json($return);
        }
        else {
             if(Auth::attempt($login))
            {
                $return['message'] = "success";
                $return['username'] = Auth::user()->username;
                $return['role'] = Auth::user()->role;
            }else{
                $return['message'] = "error";
            }

            return response()->json($return);
        }
    }
}

?>