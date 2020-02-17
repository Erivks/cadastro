<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Http\Requests\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categoria::allCategories();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.newCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Category $request)
    {
        $request->validated();
        Categoria::storeCategory($request);
        return redirect()->route('category');
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
        $category = Categoria::getCategory($id);
        return view('category.editCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Category $request, $id)
    {
        $request->validated();
        Categoria::updateCategory($id, $request);
        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categoria::deleteCategory($id);
        return redirect()->route('category');
    }

    public function categoriesJSON()
    {
        $categories = Categoria::allCategories();
        return json_encode($categories);
    }
    public function destroyAJAX($id)
    {
        return Categoria::deleteCategory($id);
    }
    public function storeAJAX(Request $request)
    {
        $validation = \Validator::make($request->all(), [
            'nome' => 'required'
        ], [
            'required' => 'O :attribute é necessário' 
        ]);

        if ($validation->fails()) 
        {
            return response()->json(['errors' => $validation->errors()]);
        } else 
        {
            $category = Categoria::storeCategoryJSON($request);
            return response()->json(['successMessage' => $request->all(), 
                                    'category' => $category
                                    ]);
        }            
    }
}
