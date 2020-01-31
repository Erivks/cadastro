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
                            class="form-control @error('productName') is-invalid @enderror" id="productName" 
                            placeholder="Produto" value="{{ $product->nome }}">
                        @error('productName')
                            <small class="form-text error-message">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="productStock">
                            Estoque <span class="requiredField">*</span>
                        </label>
                        <input type="text" name="productStock"
                            class="form-control @error('productStock') is-invalid @enderror" id="productStock"
                            placeholder="Estoque" value="{{ $product->estoque }}">
                        @error('productStock')
                            <small class="form-text error-message">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="productPrice">
                            Preço <span class="requiredField">*</span>
                        </label>
                        <input type="text" name="productPrice" 
                            class="form-control @error('productPrice') is-invalid @enderror" id="productPrice"
                            placeholder="Preço" value="{{ $product->preco }}">
                        @error('productPrice')
                            <small class="form-text error-message">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="productCategory">
                            Categoria <span class="requiredField">*</span>
                        </label>
                        <select class="form-control custom-select @error('productCategory') is-invalid @enderror" 
                            name="productCategory" id="productCategory">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('productCategory')
                            <small class="form-text error-message">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>   
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="reset" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
        </div>
    </div>
@endsection