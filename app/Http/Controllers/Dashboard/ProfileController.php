<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    //

    public function edit(){
        $id = Auth::guard('admin')->user()->id;
        $admin = Admin::find($id);
        return view('dashboard.profile.edit' , compact('admin'));
    }
    public function update(ProfileRequest $request){
        try {
            DB::beginTransaction();
            $id = Auth::guard('admin')->user()->id;
            $admin = Admin::find($id);
            if ($request->filled('password')){
                $request->merge(['password' => bcrypt($request->password)]);
            }else{
                unset($request['password']);
            }
            unset($request['id']);
            unset($request['password_confirmation']);
            $admin->update($request->all());
            DB::commit();
            return redirect()->back()->with(['success'=>'تم التحديث بنجاح']);

        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with(['success'=>'هناك خطأ ما']);
        }


    }
}
