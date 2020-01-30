@extends('layouts.app')

@section('title', 'Produto - Adicionar')

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/produtos" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="productName">Nome do Produto <span class="requiredField">*</span></label>
                        <input type="text" 
                            name="productName" 
                            class="form-control"
                            id="productName" 
                            placeholder="Produto">
                    </div>
                    <div class="form-group col-6">
                        <label for="productStock">Estoque <span class="requiredField">*</span></label>
                        <input type="text" 
                            name="productStock"
                            class="form-control"
                            id="productStock"
                            placeholder="Estoque">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="productPrice">Preço <span class="requiredField">*</span></label>
                        <input type="text" 
                            name="productPrice" 
                            class="form-control"
                            id="productPrice"
                            placeholder="Preço">
                    </div>    
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="reset" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
        </div>
    </div>
@endsection