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
                    <h4>Add Employee</h4>
                    <a href="{{ url('employees') }}" class="btn btn-primary float-end">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('add-employee') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                          <label for="first_name" class="form-label">Fisrt Name</label>
                          <input type="text" class="form-control" id="first_name" name="first_name">
                          @if ($errors->has('first_name'))
                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                          @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name">
                            @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="p_img" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="p_img" name="p_img">
                            @if ($errors->has('p_img'))
                                <span class="text-danger">{{ $errors->first('p_img') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob">
                            @if ($errors->has('dob'))
                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="c_addrs" class="form-label">Current Address</label>
                            <textarea id="c_addrs" class="form-control" rows="3" name="c_addrs"></textarea>
                            @if ($errors->has('c_addrs'))
                                <span class="text-danger">{{ $errors->first('c_addrs') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="p_addrs" class="form-label">Permenant Address</label>
                            <textarea id="p_addrs" class="form-control" rows="3" name="p_addrs"></textarea>
                            @if ($errors->has('p_addrs'))
                                <span class="text-danger">{{ $errors->first('p_addrs') }}</span>
                            @endif
                        </div>

                        <select class="form-select mb-3" multiple name="role[]">
                        <option value="">select a role</option>
                        @foreach($emp_roles as $role)
                            <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                        @endforeach
                        </select>
                          @if ($errors->has('role[]'))
                            <span class="text-danger">{{ $errors->first('role[]') }}</span>
                          @endif
                          <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection