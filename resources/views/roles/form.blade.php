
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role Name:</strong>
                <input value="{{ isset($role) ? $role->role_name:'' }}" type="text" name="role_name" class="form-control" placeholder="Role Name">
            </div>
        </div>
               
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
