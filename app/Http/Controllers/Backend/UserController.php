<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (invalidPermission('User.List')){
            return redirect()->back();
        }
        $users = User::with('roles')->where('type','admin')->orWhere('type','super_admin')->orderBy('created_at','ASC')->get();
        $data = [
            'title' => "All User",
            'users' => User::with('roles')->without('type','admin')->get(),
        ];

        return view('backend.pages.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (invalidPermission('User.Create')){
            return redirect()->back();
        }
        $data = [
            'title' => "Create New User",
            'roles' => Role::all(),
        ];
        return view('backend.pages.user.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (invalidPermission('User.Create')){
            return redirect()->back();
        }
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|max:16',
        ]);

        if (!empty($request->input('role'))){
            $user = User::create([
                'type' => $request->type,
                'name' => $request->name,
                'image' => uploadImage($request->image),
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole($request->input('role'));
        }else{
            toast('Please Select Role','warning');
            return  redirect()->back();
        }


        toast('User Created','success');
        return redirect()->route('user.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function approve($id)
    {
        if (invalidPermission('User.Edit')){
            return redirect()->back();
        }
        $user = User::findOrFail($id);
        $user->update([
           'is_approve'=> $user->is_approve == true ? false : true,
        ]);

        toast('Approval Status Change Success','success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (invalidPermission('User.Edit')){
            return redirect()->back();
        }
        $data = [
          'title' => 'Edit User',
          'roles'=>  Role::all(),
          'user'=> User::with('roles')->findOrFail($id),
        ];
        return view('backend.pages.user.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (invalidPermission('User.Edit')){
            return redirect()->back();
        }
        $this->validate($request,[
            'name'=>'required|max:50',
        ]);
        $user = User::findOrFail($id);
        if (!empty($request->role)){
            $user->update([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
            ]);
            $user->syncRoles($request->input('role'));
        }else{
            toast('Please Select Role','warning');
            return  redirect()->back();
        }
        toast('User Created','success');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (invalidPermission('User.Delete')){
            return redirect()->back();
        }
        $user = User::findOrFail($id);
        if ($user->image){
            deleteImage($user->image);
        }
        $user->delete();

        toast('User Delete Successfully...','success');
        return redirect()->route('user.index');
    }
}
