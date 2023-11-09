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
                        <a href="{{ route('user.index') }}" class="btn btn-primary float-end">User List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update',$user->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-7 mx-auto">
                                    <div class="mb-2">
                                        <label for="">Select User Type <span class="text-danger fw-bolder">*</span></label>
                                        <select name="type" id="" class="form-control  @error('role') is-invalid @enderror">
                                            <option value="" selected disabled>~~~ Select User Type ~~~</option>
                                            <option value="manager" {{ $user->type == 'manager' ? 'selected' : '' }}>Manager</option>
                                            <option value="employee" {{ $user->type == 'employee' ? 'selected' : '' }}>Employee</option>
                                        </select>
                                        @error('type')
                                        <small class="text-danger">
                                            {{$message}}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Select Role <span class="text-danger fw-bolder">*</span></label>
                                        <select name="role" id="" class="form-control @error('role') is-invalid @enderror" required>
                                            <option value="" selected disabled>~~~ Select Role ~~~</option>
                                            @foreach($roles as $role)
                                                <option
                                                    value="{{ $role->name }}
                                                    @foreach($user->roles as $u_role)
                                                        {{ $u_role->name == $role->name ? 'selected' : '' }}
                                                    @endforeach
                                                    ">{{ $role->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                        <small class="text-danger">
                                            {{$message}}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="">User Name <span class="text-danger fw-bolder">*</span></label>
                                        <input type="text"
                                               name="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               placeholder="User Name"
                                               value="{{ $user->name ?? old('name') }}"
                                               required
                                        >
                                        @error('name')
                                        <small class="text-danger">
                                            {{$message}}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="">User Email<span class="text-danger fw-bolder">*</span></label>
                                        <input type="email"
                                               name="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="Email Address"
                                               value="{{$user->email ?? old('name') }}"
                                               required
                                        >
                                        @error('email')
                                        <small class="text-danger">
                                            {{$message}}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <button class="btn btn-primary float-end">Save User</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
@endsection
