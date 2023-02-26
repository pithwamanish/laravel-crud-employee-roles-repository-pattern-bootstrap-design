<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                <input  value="{{ isset($employee) ? $employee->first_name:old('first_name') }}"  type="text" name="first_name" class="form-control" placeholder="First Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                <input value="{{ isset($employee) ? $employee->last_name:old('last_name') }}"  type="text" name="last_name" class="form-control" placeholder="Last Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input value="{{ isset($employee) ? $employee->email : old('email') }}"  type="text" name="email" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Birthdate:</strong>
                
                <input value="{{ isset($employee) ? $employee->birthdate:old('birthdate') }}" type="datetime-local" name="birthdate" class="date form-control" placeholder="Birthdate">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Current Address:</strong>                
                <textarea name="current_address" class="form-control" placeholder="Current Address">{{ isset($employee) ? $employee->current_address:old('current_address') }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permanent Address:</strong>                
                <textarea name="permanent_address" class="form-control" placeholder="Permanent Address">{{ isset($employee) ? $employee->permanent_address:old('permanent_address') }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Roles:</strong>
                <select class="roles form-select" name="roles[]" multiple>
                    @if(isset($roles))
                        @foreach ($roles as $role)   
                            <option value="{{ $role->id }}" @if( 
                                ( isset($employee) 
                            && in_array($role->id, $employee->roles->pluck('id')->toArray())
                                )
                                 || ( old('roles') &&
                                     in_array($role->id, old('roles')) 
                                     ) 
                                 ) selected="selected" 
                                  @endif 
                                 >{{ $role->role_name }}</option>
                        @endforeach
                    @endif                  
                </select>
                    
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Profile Image:</strong>
                <input type="file" name="profile_image_path" class="form-control">
                @if(isset($employee))
                   <img src="{{ url('/').$employee->profile_image_path }}" width="100" height="100"/>
                @endif
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>