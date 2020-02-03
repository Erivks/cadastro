@extends('layouts.app')

@section('title', 'Categoria - Lista')
    
@section('body')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Categorias</h5>
                @if (count($categories) > 0)
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
                                    Editar
                                </th>
                                <th scope="col">
                                    Deletar
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        {{ $category['id'] }}
                                    </td>
                                    <td>
                                        {{ $category['nome'] }}
                                    </td>
                                    <td>
                                        <a href="{{ route('category.edit', $category['id']) }}" 
                                            class="btn btn-success" 
                                            role="button">
                                            Editar
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger deleteButtonCategory" type="button" 
                                            data-id="{{ $category['id'] }}" data-toggle="modal" data-target="#modalCategory">
                                            Deletar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="modal fade" id="modalCategory" tabindex="-1" 
                        role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirmar deleção:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="modal-text">
                                        Tem certeza que deseja excluir esta categoria? Todos os produtos cadastrados com a mesma, serão excluídos.
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal" aria-label="Fechar">
                                        Cancelar
                                    </button>
                                    <a id="deleteButton" href="" type="button" class="btn btn-danger">
                                        Deletar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        <p class="alert-text">
                            Não existem registros de categorias cadastradas.
                        </p>
                    </div>
                    <a href="{{ route('category.new') }}"
                        class="btn btn-primary"
                        role="button">
                        Adicionar categoria
                    </a>
                @endif
        </div>
    </div>    
@endsection