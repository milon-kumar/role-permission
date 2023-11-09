@extends('backend.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <div class="d-inline-block">
                            <h2 class="font-bold">{{ $title }}</h2>
                            <p class="">Show Here All Roles And Permissions . There Have Total {{ $roles->count() }} Roles</p>
                        </div>
                        <a href="{{ route('role-permission.create') }}" class="btn btn-primary float-end">Create Role</a>
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-bordered dt-responsive editable-pre-wrapped w-100">
                            <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Role Name</th>
                                <th>Permission</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($roles as $role)
                                <tr>
                                    <td>#{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td width="60%">
                                        <div class="">
                                            @foreach($role->permissions as $permission)
                                                <span class="h6 bg-primary d-inline-block p-1 mb-1 rounded">{{ $permission->name ?? '' }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        @if(!($role->name == 'Admin'))
                                            @can('Role.Edit')
                                                <a href="{{ route('role-permission.edit',$role->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('Role.Delete')
                                                <a onclick="deleteData({{ $role->id }})" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                    <form class="d-none"
                                                          action="{{ route('role-permission.destroy',$role->id) }}"
                                                          method="post"
                                                          id="delete-form-{{$role->id}}">@csrf @method('DELEte')</form>
                                            @endcan

                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="p-5 text-center">
                                            <h1 class="display-4 font-bold">No Data Found</h1>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
