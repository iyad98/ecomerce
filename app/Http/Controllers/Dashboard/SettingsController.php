<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingMethodRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    //

    public function editShippingMethods($type)
    {
//        return Setting::all();
        if ($type == 'free') {
            $shipping_method = Setting::where('key', 'free_shipping_lable')->first();
        } elseif ($type == 'inner') {
            $shipping_method = Setting::where('key', 'local_lable')->first();

        } elseif ($type == 'outer') {
            $shipping_method = Setting::where('key', 'outer_lable')->first();
        }
        return view('dashboard.settings.shippings.edit' , compact('shipping_method'));
    }

    public function updateShippingMethods(ShippingMethodRequest $request , $id){

        try {
            DB::beginTransaction();
            $shippingmethod = Setting::find($id);
            $shippingmethod->update(['plain_value' => $request->plain_value]);
            $shippingmethod->value = $request->value;
            $shippingmethod->save();
            DB::commit();
            return redirect()->back()->with(['success' => __('admin/shipping.shipping-success')]);
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with(['error' => 'خطأ في النظام']);

        }


    }
}
