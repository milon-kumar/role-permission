@extends('backend.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <div class="d-inline-block">
                            <h2 class="font-bold">{{ $title }}</h2>
                            <p class=""></p>
                        </div>
                        <a href="{{ route('role-permission.index') }}" class="btn btn-primary float-end">Role List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('role-permission.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <div class="input-group">
                                    <input type="text"
                                           class="form-control @error('name') is-invalid border-danger  @enderror"
                                           name="name"
                                           value="{{old('name')}}"
                                           required
                                           placeholder="Role Name">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-content-save"></i> Save Role</button>
                                </div>
                                <div class="">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                @foreach($permissions as $key => $permission)
                                    <div class="col-md-3 mb-2">
                                        <div class="card h-100 border">
                                            <div class="card-header">
                                                <h5>{{ $key }}</h5>
                                            </div>
                                            <div class="card-body">
                                                @foreach($permission as $single_permission)
                                                    <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                                        <input class="form-check-input"
                                                               name="permissions[]"
                                                               type="checkbox"
                                                               value="{{ $single_permission->name }}"
                                                               id="{{ $single_permission->name.$loop->iteration }}">
                                                        <label class="form-check-label" for="{{ $single_permission->name.$loop->iteration }}">{{ $single_permission->name ?? '' }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
@endsection
