<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    //
    protected $table = 'category_translations';
    protected $fillable = ['name','category_id' , 'locale'];
    public $timestamps = false;
}