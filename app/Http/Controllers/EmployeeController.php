<?php

namespace App\Http\Controllers;



use App\Models\Employee;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use App\Repositories\EmployeeInterface;


class EmployeeController extends Controller
{

    protected $emp;

    public function __construct(EmployeeInterface $emp)
    {
        $this->emp = $emp;
        
    }

    public function index(){
        $employee = $this->emp->all();
        return view('employee.index',compact('employee'));
    }

    public function create(){
        $emp_roles = Roles::all();
        
        return view('employee.create',compact('emp_roles'));
    }

    public function store(Request $request){

        $this->validateInput($request);

        $data = $request->all();
        if($request->hasFile('p_img')){
            $file       = $request->file('p_img');
            $ext        = $file->getClientOriginalExtension();
            $filename   = Str::random(10).'.'.$ext;
            $file->move('upload/employee/',$filename);
            $data['profile_img']  = $filename;
        }else{
            $data['profile_img']  = "";
        }

        $this->emp->store($data);

        return redirect()->back()->with('msg','Employee Added Successfully');
    }

    public function edit($id)
    {
        $emp_roles = Roles::all();
        $employee = $this->emp->get($id);
        return view('employee.edit',compact('employee','emp_roles'));
    }

    public function update(Request $request,$id)
    {
        $this->validateInput($request);

        $data = $request->all();
        
        if($request->hasFile('p_img')){
            $destination = 'upload/employee/'.$request->oldimage;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file       = $request->file('p_img');
            $ext        = $file->getClientOriginalExtension();
            $filename   = Str::random(30).'.'.$ext;
            $file->move('upload/employee/',$filename);
            $data['profile_img']  = $filename;
        }else{
            $data['profile_img']  = $request->oldimage;
        }

        $this->emp->update($id,$data);        
        return redirect()->back()->with('msg','Employee Updated Successfully');
    }

    public function destroy($id)
    {
        $employee = Employee::findorFail($id);
        $destination = 'upload/employee/'.$employee->profile_img;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $this->emp->delete($id); 
        return redirect()->back()->with('msg','Employee Deleted Successfully');

    }


    public function validateInput($request)
    {
        $validatedData = $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email',
            'dob'           => 'required|date',
            'c_addrs'  => 'required',
            'p_addrs' => 'required',
            'role'          => 'required|array|min:1',
        ],
        [
            'first_name.required' => 'First name is required',
            "last_name.required" => "Last name is required ",
            "email.required" => "Email address is required ",
            "dob.required" => "Date of Birth is required ",
            "c_addrs.required" => "Current Address is required ",
            "p_addrs.required" => "Permenant Address is required ",
            "role.required" => "Role is required ",
        ]);
    }

    

    
}
