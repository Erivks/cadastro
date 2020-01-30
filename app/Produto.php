<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public static function allProduct()
    {
        return self::all();
    }

    public static function storeProduct($request)
    {
        $product = new Produto();
        $product->nome = $request->input('productName');
        $product->estoque = $request->input('productStock');
        $product->preco = $request->input('productPrice');
        $product->categoria_id = $request->input('productCategory');
        $product->save();
    }

    public static function getProduct($id)
    {
        return self::find($id);
    }

    public static function updateProduct($request, $id)
    {
        Produto::where('id', $id)
            ->update([
                        'nome' => $request->input('productName'),
                        'estoque' => $request->input('productStock'),
                        'preco' => $request->input('productPrice'),
                        'categoria_id' => $request->input('productCategory')
                    ]);
    }

    public static function deleteProduct($id)
    {
        self::destroy($id);
    }
}
