<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IEmployeeInterface;
use App\Employee;

class EmployeeRepository implements IEmployeeInterface
{

    /**
     * Function : Get All Employees
     * @param NA
     * @return Employees
     */
    public function all()
    {
        return Employee::paginate();
    }

    /**
     * Function : Create Employee
     *
     * @param [type] $request
     * @return Employee
     */
    public function create($request)
    {
        return Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'profile_image_path' => $request->profile_image_path,
            'current_address' => $request->current_address,
            'permanent_address' => $request->permanent_address,
        ]);
    }

    /**
     * Function : Get Employee By Id
     * @param [type] $id
     * @return Employee
     */
    public function get($id)
    {
        return Employee::find($id);
    }

    /**
     * Function : Update Employee
     *
     * @param [type] $request
     * @param [type] $id
     * @return Employee
     */
    public function update($request, $id)
    {
        $Employee = Employee::find($id);
        if ($Employee) {
            $Employee['first_name'] = $request->first_name;
            $Employee['last_name'] = $request->last_name;
            $Employee['email'] = $request->email;
            $Employee['birthdate'] = $request->birthdate;
            if(isset($request->profile_image_path))
             $Employee['profile_image_path'] = $request->profile_image_path;
            $Employee['current_address'] = $request->current_address;
            $Employee['permanent_address'] = $request->permanent_address;
            $Employee->save();
            return $Employee;
        }
    }

    /**
     * Function : Delete Employee
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        $Employee = Employee::find($id);
        if ($Employee) {
            return $Employee->delete();
        }
    }
}