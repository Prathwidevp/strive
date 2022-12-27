@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Employee Table</h4>
                    <a href="{{ url('add-employee') }}" class="btn btn-primary float-end">Add Employee</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Profile Image</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($employee as $item)

                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->full_name}}</td>
                                <td>{{ $item->email }}</td>
                               
                                <td>
                                    <img src="{{  asset('upload/employee/'.$item->profile_img) }}" width="70px" height="70px" alt="">
                                </td>
                                <td>
                                    @foreach($item->roles as $role)
                                        <li>{{ $role->name }}</li>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ url('edit-employee/'.$item->id) }}" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure you want to delete this item?')" href="{{ url('delete-employee/'.$item->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                              </tr>
                                
                            @endforeach
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection