<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employeeroles','role_id','emp_id');
    }

    
}
