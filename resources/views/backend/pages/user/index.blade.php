@extends('backend.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <div class="d-inline-block">
                            <h2 class="font-bold">{{ $title }}</h2>
                            <p class="">Show Here All User And Role . There Have Total {{ $users->count() }} Users</p>
                        </div>
                        @can('User.Create')
                            <a href="{{ route('user.create') }}" class="btn btn-primary float-end">Create User</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-bordered dt-responsive editable-pre-wrapped w-100">
                            <thead>
                            <tr>
                                <th>#SL</th>
                                <th>User</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>#{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="javascript: void(0);">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 align-self-center me-3">
                                                    <img src="{{ $user->image ? asset($user->image) : defaultImage($user->name) }}" class="rounded-circle avatar-xs" alt="">
                                                </div>

                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate font-size-14 mb-1">{{ $user->name ?? '' }}</h5>
                                                    <p class="text-muted mb-0">{{ $user->email ?? '' }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td width="40%">
                                        <div class="">
                                            @foreach($user->roles as $role)
                                                <span class="h6 bg-primary d-inline-block p-1 mb-1 rounded">{{ $role->name ?? '' }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        @can('User.Edit')
                                            <a href="{{ route('user.edit',$user->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('User.Delete')
                                            <a onclick="deleteData({{ $user->id }})" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form class="d-none"
                                                  action="{{ route('user.destroy',$user->id) }}"
                                                  method="post"
                                                  id="delete-form-{{$user->id}}">@csrf @method('DELEte')</form>
                                        @endcan

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
