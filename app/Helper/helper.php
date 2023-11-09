<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Storage;


if (!function_exists('uploadImage')) {
    function uploadImage($image, $oldImage = null)
    {
        if ($image) {
            $imagePath = $image->store('/images', ['disk' => 'my_files']);
            if ($oldImage) {
                Storage::disk('my_files')->delete($oldImage);
            }
        } else {
            $imagePath = $oldImage;
        }
        return $imagePath;
    }
}

if (!function_exists('deleteImage')) {
    function deleteImage($image)
    {
        Storage::disk('my_files')->delete($image);
        return true;
    }
}

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        $setting = Setting::where('type', $key)->first();
        return $setting == null ? $default : $setting->value;
    }
}

if (!function_exists('defaultImage')) {
    function defaultImage($name)
    {
        return "https://ui-avatars.com/api/?name=".$name."&format=svg&background=random&size=40&bold=true";
    }
}

if (!function_exists('invalidPermission')){
    function invalidPermission($permission = null){
        if (! auth()->user()->can($permission)){
            toast('Sorry Your Request Is Invalid - 403','error');
            return true;
        }
    }
}
