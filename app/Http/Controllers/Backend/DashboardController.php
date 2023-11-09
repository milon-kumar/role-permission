<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data =[
          'title'=>"Dashboard",
          'total_users'=>User::count(),
          'total_manager'=>User::where('type','manager')->count(),
          'total_employee'=>User::where('type','employee')->count(),
          'recent_ten_users'=>User::latest()->withOut('type','admin')->limit(10)->get(),
        ];

        return view('backend.pages.dashboard.dashboard',$data);
    }
}
