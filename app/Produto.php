<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public static function allProduct()
    {
        return self::all();
    }
}
