<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    use Translatable;
    protected $table = 'categories';
    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];
    protected $fillable = ['id' , 'parent_id' , 'slug' , 'is_active' , 'created_at' , 'updated_at'];
    protected $hidden = [];

    protected $casts = [
        'is_active' => 'boolean'
    ];


}
