<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function update(Request $request)
    {
        foreach ($request->types as $key => $type) {
            $business_settings = Setting::where('type', $type)->first();
            if($business_settings!=null){
                if(gettype($request[$type]) == 'array'){
                    $business_settings->value = $request->hasFile($request[$type])  ? uploadImage($request[$type]) :  json_encode($request[$type]);
                }
                else {
                    $business_settings->value = $request->hasFile($type)  ? uploadImage($request[$type]) : $request[$type];
                }
                $business_settings->save();
            }
            else{
                $business_settings = new Setting();
                $business_settings->type = $type;
                if(gettype($request[$type]) == 'array'){
                    $business_settings->value = $request->hasFile($request[$type])  ? uploadImage($request[$type]): json_encode($request[$type]);
                }
                else {
                    $business_settings->value = $request->hasFile($type)  ? uploadImage($request[$type]) : $request[$type];
                }
                $business_settings->save();
            }
        }

        Artisan::call('cache:clear');
        toast('Data Updated ......... :)','success');
        return back();
    }
}
