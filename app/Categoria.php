<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public static function allCategories() 
    {
        return self::all();
    }
}
