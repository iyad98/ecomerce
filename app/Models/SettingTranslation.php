<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    //

    protected $fillable = ['id' , 'setting_id' , 'locale' , 'value' , 'created_at' , 'updated_at'];
}
