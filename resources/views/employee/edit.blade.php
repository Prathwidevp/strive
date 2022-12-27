@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if(session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Edit Employee</h4>
                    <a href="{{ url('employees') }}" class="btn btn-primary float-end">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('update-employee/'.$employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                          <label for="first_name" class="form-label">Fisrt Name</label>
                          <input type="text" class="form-control" value="{{$employee->first_name}}" id="first_name" name="first_name">
                          @if ($errors->has('first_name'))
                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                          @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" value="{{$employee->last_name}}" id="last_name" name="last_name">
                            @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{$employee->email}}" id="email" name="email">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="p_img" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="p_img" name="p_img">
                            <img src="{{  asset('upload/employee/'.$employee->profile_img) }}" width="70px" height="70px" alt="">
                            @if ($errors->has('p_img'))
                                <span class="text-danger">{{ $errors->first('p_img') }}</span>
                            @endif

                        </div>
                        <div class="form-group mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="{{$employee->dob}}">
                            @if ($errors->has('dob'))
                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="c_addrs" class="form-label">Current Address</label>
                            <textarea id="c_addrs" class="form-control" rows="3" name="c_addrs">{{$employee->current_addr}}</textarea>
                            @if ($errors->has('current_addr'))
                                <span class="text-danger">{{ $errors->first('current_addr') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="p_addrs" class="form-label">Permenant Address</label>
                            <textarea id="p_addrs" class="form-control" rows="3" name="p_addrs">{{$employee->permenant_addr}}</textarea>
                            @if ($errors->has('permenant_addr'))
                                <span class="text-danger">{{ $errors->first('permenant_addr') }}</span>
                            @endif
                        </div>

                        <input type="hidden" name="oldimage" value="{{$employee->profile_img}}">

                        <select class="form-select mb-3" multiple name="role[]">
                            <option value="">select a role</option>
                            @foreach($emp_roles as $role)
                                    <option value="{{ $role['id'] }}" 

                                    @foreach($employee->roles as $emppvt)
                                        {{ $role['id'] == $emppvt->pivot['role_id'] ? ' selected' : '' }}
                                    @endforeach
                                    
                                    
                                     >{{ $role['name'] }}</option>
                            @endforeach
                            </select>
                          @if ($errors->has('role[]'))
                            <span class="text-danger">{{ $errors->first('role[]') }}</span>
                          @endif
                          <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection