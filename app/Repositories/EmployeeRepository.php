<?php

namespace App\Repositories;
use App\Models\Employee;
use Illuminate\Support\Str;



class EmployeeRepository implements EmployeeInterface 
{

    public function all(){
        return Employee::with('roles')->get();
    }
    
    public function store(array $data){

        $employee = new Employee;
        $employee->first_name   = $data['first_name'];
        $employee->last_name    = $data['last_name'];
        $employee->email        = $data['email'];
        $employee->dob          = $data['dob'];
        $employee->current_addr = $data['c_addrs'];
        $employee->permenant_addr = $data['p_addrs'];
        $employee->profile_img = $data['profile_img'];
        $employee->save();
        $employee->roles()->attach($data['role']);

    }

    public function get($id){
        return Employee::with('roles')->findorFail($id);
    }

    public function update($id,array $data){
        
        $employee = Employee::findorFail($id);
        $employee->first_name   = $data['first_name'];
        $employee->last_name    = $data['last_name'];
        $employee->email        = $data['email'];
        $employee->dob          = $data['dob'];
        $employee->current_addr = $data['c_addrs'];
        $employee->permenant_addr = $data['p_addrs'];
        $employee->profile_img = $data['profile_img'];
        $employee->update();
        $employee->roles()->sync($data['role']);
    }

    public function delete($id){
        $employee = Employee::findorFail($id);
        $employee->delete();
        $employee->roles()->detach();
    }

}