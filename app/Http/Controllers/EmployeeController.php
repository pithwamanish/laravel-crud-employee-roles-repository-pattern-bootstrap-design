<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Repositories\Interfaces\IEmployeeInterface;
use App\Repositories\Interfaces\IRoleInterface;
use App\Http\Requests\EmployeeStoreRequest;

class EmployeeController extends Controller
{
    private $employeeRepository;
    private $roleRepository;
    
    public function __construct(IEmployeeInterface $employeeRepository, IRoleInterface $roleRepository) 
    {
        $this->employeeRepository = $employeeRepository;
        $this->roleRepository = $roleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.index',[
            'employees' => $this->employeeRepository->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $roles = $this->roleRepository->all();
        return view('employees.create',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request)
    {
        $validated = $request->validated();

        if($request->hasFile('profile_image_path')) {
            $imageName = time().'.'.$request->profile_image_path->extension();  
    
            $request->profile_image_path->move(public_path('images'), $imageName);
            $request->profile_image_path = '/images/'.$imageName;   
        }     
        if($employee = $this->employeeRepository->create($request)) {
             $employee->roles()->sync($request->roles);   
            return redirect()->route('employees.index')->with(['status' => 'Employee Added Successfully.']);
        }
        else
          return redirect()->back()->with(['status' => 'Error occured. Could not save employee.']);
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $roles = $this->roleRepository->all();
        
        return view('employees.edit',['employee' => $employee, 'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeStoreRequest $request, Employee $employee)
    {
        $validated = $request->validated();

        if($request->hasFile('profile_image_path')) {
            $imageName = time().'.'.$request->profile_image_path->extension();  
    
            $request->profile_image_path->move(public_path('images'), $imageName);
            $request->profile_image_path = '/images/'.$imageName;    
        } 

        if($employee = $this->employeeRepository->update($request, $employee->id)) {
             $employee->roles()->sync($request->roles);   
            return redirect()->route('employees.index')->with(['status' => 'Employee Updated Successfully.']);
        }
        else
          return redirect()->back()->with(['status' => 'Error occured. Could not update employee.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if($this->employeeRepository->delete($employee->id)) {
              
           return redirect()->route('employees.index')->with(['status' => 'Employee deleted successfully.']);
       }
       else
         return redirect()->back()->with(['status' => 'Error occured. Could not delete employee.']);
    }
}
