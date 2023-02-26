@extends('employees.layout')

@include('header')  
<div class="container">
    <h3 class="text-center">Employees</h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Employees Listing
                </div>
                <div class="row">
                <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                <a class="btn btn-success mb-2" id="new-user" href="{{ route('employees.create')}}">Add Employee</a>
                </div>
                </div>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example1">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Birthdate</th>
                                    <th>Roles</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                             @if(isset($employees))
                                @foreach ($employees as $employee)
                                <tr class="odd gradeX">
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->birthdate }}</td>
                                    <td>
                                    @if(isset($employee->roles))
                                        <ul>
                                        @foreach ($employee->roles as $role)
                                            <li> {{ $role->role_name }} </li>

                                        @endforeach
                                        </ul> 
                                     @endif    
                                    </td>
                                    <td>
                                        <form action="{{ route('employees.destroy',['employee' => $employee->id]) }}" method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <div class="btn-group btn-group-xs">
                                                <a href="{{ route('employees.edit' , ['employee' => $employee->id]) }}"  class="btn btn-primary">Edit</a>
                                                <button type="submit" id="deleteButton" data-name="{{ $employee->id }}" class="btn btn-xs btn-warning show_confirm">Delete</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>

                                @endforeach
                             @endif   
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    {{ $employees->links() }}
</div>