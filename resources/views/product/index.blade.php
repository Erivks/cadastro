@extends('layouts.app')

@section('body')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Produtos</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">
                            ID
                        </th>
                        <th scope="col">
                            Nome
                        </th>
                        <th scope="col">
                            Estoque
                        </th>
                        <th scope="col">
                            Preço
                        </th>
                        <th scope="col">
                            Categoria
                        </th>
                        <th scope="col">
                            Editar
                        </th>
                        <th scope="col">
                            Deletar
                        </th>
                        <th scope="col">
                            Detalhe
                        </th>
                    </tr>
                </thead>
                <tbody>
                        
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" type="button">
                Adicionar categoria
            </button>
        </div>
    </div>    
@endsection