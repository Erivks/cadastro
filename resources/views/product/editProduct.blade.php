@extends('layouts.app')

@section('title', 'Produto - Editar')
    
@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('product.update', $product->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="productName">
                            Nome do Produto <span class="requiredField">*</span>
                        </label>
                        <input type="text" name="productName" 
                            class="form-control" id="productName" 
                            placeholder="Produto" value="{{ $product->nome }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="productStock">
                            Estoque <span class="requiredField">*</span>
                        </label>
                        <input type="text" name="productStock"
                            class="form-control" id="productStock"
                            placeholder="Estoque" value="{{ $product->estoque }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="productPrice">
                            Preço <span class="requiredField">*</span>
                        </label>
                        <input type="text" name="productPrice" 
                            class="form-control" id="productPrice"
                            placeholder="Preço" value="{{ $product->preco }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="productCategory">
                            Categoria <span class="requiredField">*</span>
                        </label>
                        <select class="form-control custom-select" name="productCategory" id="productCategory">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>   
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="reset" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
        </div>
    </div>
@endsection