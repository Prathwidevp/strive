<?php

namespace App\Repositories;

interface EmployeeInterface{

    public function all();
    public function store(array $data);

    public function get($id);

    public function update($id,array $data);
    public function delete($id);

}