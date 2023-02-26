<?php

namespace App\Repositories\Interfaces;

interface IRoleInterface
{
    public function all();
    public function create($request);
    public function get($roleId);
    public function update($request, $roleId);
    public function delete($roleId);
}