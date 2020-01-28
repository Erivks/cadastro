<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public static function allCategories() 
    {
        return self::all();
    }

    public static function storeCategorie($request)
    {
        $category = new Categoria();
        $category->nome = $request->input('categoryName');
        $category->save();
    }

    public static function getCategory($id)
    {
        return self::find($id);
    }

    public static function updateCategory($id, $request)
    {
        Categoria::where('id', $id)
            ->update(['nome' => $request->input('categoryName')]);
    }

    public static function deleteCategory($id)
    {
        self::destroy($id);
    }
}
