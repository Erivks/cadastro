<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Produto::allProduct();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categoria::allCategories();
        return view('product.newProduct', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $request)
    {  
        $request->validated();
        $product = Produto::storeProduct($request);
        return redirect()->route('product');;
    }

    public function storeAJAX(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nome' => 'required',
            'estoque' => 'required',
            'estoque' => 'required',
            'categoria_id' => 'required'
        ], [
            'required' => 'O campo :attribute é necessário'
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=> $validator->errors()]);
        }
        $product = Produto::storeProductJSON($request);
        return response()->json(['success' => 'uhu']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categoria::all();
        $product = Produto::getProduct($id);
        return view('product.editProduct', ['categories' => $category, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $request, $id)
    {
        $request->validated();
        Produto::updateProduct($request, $id);
        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produto::deleteProduct($id);
        return redirect()->route('product');
    }

    public function productJSON()
    {
        $products = Produto::allProduct();
        return json_encode($products);
    }
}
