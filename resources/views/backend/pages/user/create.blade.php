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
                        <form action="{{ route('user.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-7 mx-auto">
                                    <div class="mb-2">
                                        <label for="">Select User Type <span class="text-danger fw-bolder">*</span></label>
                                        <select name="type" id="" class="form-control  @error('role') is-invalid @enderror">
                                            <option value="" selected disabled>~~~ Select User Type ~~~</option>
                                            <option value="manager">Manager</option>
                                            <option value="employee">Employee</option>
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
                                                <option value="{{ $role->name }}">{{ $role->name ?? '' }}</option>
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
                                               value="{{ old('name') }}"
                                               required
                                        >
                                        @error('name')
                                            <small class="text-danger">
                                                {{$message}}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Profile Image</label>
                                        <input type="file"
                                               name="image"
                                               class="form-control @error('image') is-invalid @enderror"
                                               value="{{ old('image') }}"
                                               placeholder="User Name"
                                        >
                                    </div>
                                    <div class="mb-2">
                                        <label for="">User Email<span class="text-danger fw-bolder">*</span></label>
                                        <input type="email"
                                               name="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="Email Address"
                                               value="{{ old('name') }}"
                                               required
                                        >
                                        @error('email')
                                        <small class="text-danger">
                                            {{$message}}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Password <span class="text-danger fw-bolder">*</span></label>
                                        <input type="password"
                                               name="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               placeholder="User Name"
                                               required
                                        >
                                        @error('password')
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
