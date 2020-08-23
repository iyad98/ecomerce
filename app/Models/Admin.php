<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends  Authenticatable

{
    //
    protected $guarded = 'admin';
    protected $table = 'admins';
    protected $fillable = ['id' , 'name' , 'email' , 'password' , 'created_at' , 'updated_at' , 'remember_token'];
    protected $hidden = [];
}
