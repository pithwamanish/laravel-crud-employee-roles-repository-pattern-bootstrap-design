@extends('roles.layout')
@include('header')
<div class="container">
    <h3 class="text-center">Roles</h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Roles Listing
                </div>
                <div class="row">
                <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                <a class="btn btn-success mb-2" id="new-user" href="{{ route('roles.create')}}">Add Role</a>
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
                                    <th>Role Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                             @if(isset($roles))
                                @foreach ($roles as $role)
                                <tr class="odd gradeX">
                               
                                    <td>{{ $role->role_name }}</td>
                                    <td>
                                        <form action="{{ route('roles.destroy',['role' => $role->id]) }}" method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <div class="btn-group btn-group-xs">
                                                <a href="{{ route('roles.edit' , ['role' => $role->id]) }}"  class="btn btn-primary">Edit</a>
                                                <button type="submit" id="deleteButton" data-name="{{ $role->id }}" class="btn btn-xs btn-warning show_confirm">Delete</button>
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
    {{ $roles->links() }}
</div>

