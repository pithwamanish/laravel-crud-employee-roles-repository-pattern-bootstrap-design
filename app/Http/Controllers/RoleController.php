<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\IRoleInterface;
use App\Http\Requests\RoleStoreRequest;

class RoleController extends Controller
{
    private $RoleRepository;

    public function __construct(IRoleInterface $RoleRepository) 
    {
        $this->RoleRepository = $RoleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->RoleRepository->all();
        
        return view('roles.index',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        $validated = $request->validated();

        if($this->RoleRepository->create($request)) {
               
           return redirect()->route('roles.index')->with(['status' => 'Role Added Successfully.']);
       }
       else
         return redirect()->back()->with(['status' => 'Error occured. Could not save role.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
       
        return view('roles.edit',['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleStoreRequest $request, Role $role)
    {
        $validated = $request->validated();

        if($this->RoleRepository->update($request, $role->id)) {
               
            return redirect()->route('roles.index')->with(['status' => 'Role Updated Successfully.']);
        }
        else
          return redirect()->back()->with(['status' => 'Error occured. Could not update role.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if($this->RoleRepository->delete($role->id)) {
               
            return redirect()->route('roles.index')->with(['status' => 'Role deleted successfully.']);
        }
        else
          return redirect()->back()->with(['status' => 'Error occured. Could not delete role.']);        
    }
}
