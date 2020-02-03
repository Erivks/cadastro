@extends('layouts.app')

@section('body')
<div class="card">
        <div class="card-body">
            <h5 class="card-title">Produtos</h5>
                @if (count($products) > 0)
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
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        {{ $product['id'] }}
                                    </td>
                                    <td>
                                        {{ $product['nome'] }}
                                    </td>
                                    <td>
                                        {{ $product['estoque'] }}
                                    </td>
                                    <td>
                                        {{ $product['preco'] }}
                                    </td>
                                    <td>
                                        {{ $product['cat_nome'] }}
                                    </td>
                                    <td>
                                        <a href="{{ route('product.edit', $product['id']) }}" 
                                            class="btn btn-success" 
                                            role="button">
                                            Editar
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('product.delete', $product['id']) }}" 
                                        class="btn btn-danger" role="button">
                                            Deletar
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#productDetails" class="btn btn-warning" 
                                            aria-controls="collapseDetails" aria-expanded="false" 
                                            data-toggle="collapse" role="button">
                                            Detalhes
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-danger" role="alert">
                        <p class="alert-text">
                            Não existem registros de produtos cadastrados.
                        </p>
                    </div>
                    <a href="{{ route('product.new') }}"
                        class="btn btn-primary"
                        role="button">
                        Adicionar produto
                    </a>
                @endif
        </div>
    </div>    
@endsection