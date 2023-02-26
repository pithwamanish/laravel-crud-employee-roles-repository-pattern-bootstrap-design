<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IRoleInterface;
use App\Role;

class RoleRepository implements IRoleInterface
{

    /**
     * Function : Get All Roles
     * @param NA
     * @return Roles
     */
    public function all()
    {
        return Role::paginate();
    }

    /**
     * Function : Create Role
     *
     * @param [type] $request
     * @return Role
     */
    public function create($request)
    {
        return Role::create([
            'role_name' => $request->role_name,
          
        ]);
    }

    /**
     * Function : Get Role By Id
     * @param [type] $id
     * @return Role
     */
    public function get($id)
    {
        return Role::first($id);
    }

    /**
     * Function : Update Role
     *
     * @param [type] $request
     * @param [type] $id
     * @return Role
     */
    public function update($request, $id)
    {
        $Role = Role::find($id);
        if ($Role) {
            $Role['role_name'] = $request->role_name;
           
            $Role->save();
            return $Role;
        }
    }

    /**
     * Function : Delete Role
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        $Role = Role::find($id);
        if ($Role) {
            return $Role->delete();
        }
    }
}