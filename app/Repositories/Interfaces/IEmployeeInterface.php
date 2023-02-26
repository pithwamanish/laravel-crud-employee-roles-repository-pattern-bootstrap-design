<?php

namespace App\Repositories\Interfaces;

interface IEmployeeInterface
{
    public function all();
    public function create($request);
    public function get($employeeId);
    public function update($request, $employeeId);
    public function delete($employeeId);
}