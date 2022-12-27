<?php

namespace App\Repositories;
use Illuminate\Support\ServiceProvider;

class EmpRepoServiceProvider extends ServiceProvider{

    public function register()
    {
        $this->app->bind(
            'App\Repositories\EmployeeInterface', 
            'App\Repositories\EmployeeRepository'
        );
    }
}
