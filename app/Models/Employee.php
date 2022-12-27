<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $timestamp = false;

    protected $table= 'employees';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'profile_img',
        'dob',
        'current_addr',
        'permenant_addr',
        'role',
    ];

   

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'employeeroles','emp_id','role_id')->withPivot('id');;
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }
    


}
