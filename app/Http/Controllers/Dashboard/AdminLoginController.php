<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    //
    public function login(){
        return view('dashboard.auth.login');
    }
    public function checklogin(AdminLoginRequest $request){
        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')] , $remember_me)){
            return redirect()->route('DashboardAdmin');
        }else {
            return redirect()->route('admin.login')->with(['error' => 'هناك خطأ في البيانات']);
        }
    }
}
