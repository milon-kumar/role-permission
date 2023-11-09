<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (invalidPermission('Role.List')){
            return redirect()->back();
        }
        $data = [
            'title'=>"All Role And Permission",
            'roles'=>Role::with('permissions')->latest()->get(),
        ];
        return view('backend.pages.role_permission.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (invalidPermission('Role.Create')){
            return redirect()->back();
        }
        $data = [
            'title'=>"Create A New Role",
            'permissions' => Permission::all()->groupBy('module'),
        ];
        return view('backend.pages.role_permission.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (invalidPermission('Role.Create')){
            return redirect()->back();
        }
        $this->validate($request,[
            'name'=>'required|unique:roles,name',
        ]);

        if (!empty($request->input('permissions'))){
            $role = Role::create(['name'=>$request->input('name')]);
            $role->givePermissionTo($request->input('permissions'));
            toast('Role Crated Successfully...','success');
            return  redirect()->route('role-permission.index');
        }else{
            toast('Please Select Permission','warning');
            return redirect()->back();
        }
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
        if (invalidPermission('Role.Edit')){
            return redirect()->back();
        }
        $data = [
            'title'=>"Role Edit",
            'permissions'=>Permission::all()->groupBy('module'),
            'role'=>Role::with('permissions')->findOrFail($id)
        ];
        return view('backend.pages.role_permission.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (invalidPermission('Role.Edit')){
            return redirect()->back();
        }
        $this->validate($request,[
            'name'=>'required',
        ]);
        $role = Role::findOrFail($id);
        if (!empty($request->input('permissions'))){
            $role->update(['name'=>$request->input('name')]);
            $role->syncPermissions($request->input('permissions'));
            toast('Role Update Successfully...','success');
            return  redirect()->route('role-permission.index');
        }else{
            toast('Please Select Permission','warning');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (invalidPermission('Role.Delete')){
            return redirect()->back();
        }
        $role = Role::findOrFail($id);
        $role->delete();
        toast('Role Delete Successfully','success');
        return redirect()->route('role-permission.index');
    }
}
