<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Roles;

class RoleController extends Controller
{
    public function addrole($var = null)
    {
        $roles = [
            ['name' => 'Manager'],
            ['name' => 'Developer'],
            ['name' => 'Tester'],
            ['name' => 'Admin'],
            ['name' => 'Team Leader'],
            ['name' => 'Junior Developer'],
        ];

        Roles::insert($roles);
    }
}
