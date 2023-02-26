<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name','email', 'birthdate','profile_image_path', 'current_address','permanent_address' ];
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
