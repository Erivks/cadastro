@extends('layouts.app')

@section('title', 'Categoria - Lista')
    
@section('body')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Categorias</h5>
                @if (count($categories) > 0)
                    <table class="table table-hover" id="tableCategory">
                        <thead class="thead-dark">
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
        <div class="card-footer">
            <button class="btn btn-primary" role="button" 
                type="button" data-target="#modalAddCategory" 
                data-toggle="modal" id="btnAddCategory">
                Adicionar Categoria
            </button>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="modalAddCategory">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Adicionar Categoria
                    </h5>
                </div>
                <div class="modal-body">
                    <form action="" id="formAddCategory">
                        @csrf
                        <div class="form-group">
                            <label for="categoryName" class="control-label">Nome Categoria: *</label>
                            <input type="text" class="form-control" name="categoryName" id="categoryName">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" role="button" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" role="button">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            }
        });
        $('.deleteButtonCategory').on('click', function() {
            let idCategory = $(this).data('id');
            let routeDelete = '/categorias/deletar/' + idCategory;
            $('#deleteButton').attr('href', routeDelete);
        });
        function makeRowCategory(category)
        {
            let rowCategory = "<tr>" +
                                    "<td>" + category.id + "</td>" +
                                    "<td>" + category.nome + "</td>" +
                                    "<td>" +
                                        '<a href="/editar/' + category.id + '" class="btn btn-success" role="button">' +
                                            'Editar' +
                                        '</a>' +
                                    "</td>" +
                                    "<td>" +
                                        '<button class="btn btn-danger deleteButtonCategory" type="button"' + 
                                            'data-id="' + category.id + '"data-toggle="modal" data-target="#modalCategory">' +
                                            'Deletar' +
                                        '</button>' +
                                    "</td>" +
                              "</tr>";
            return rowCategory
        }
        function getCategoryInput()
        {
            var category = {
                nome: $('#categoryName').val()
            }
            return category
        }
        function storeCategory(category)
        {
            $.ajax({
                url: '/api/categorias',
                type: 'POST',
                data: category,
                dataType: 'JSON',
                success: function (data) {
                    let category = data.category;
                    let rowCategory = makeRowCategory(category);
                    console.log(rowCategory);
                    $('#tableCategory>tbody').append(rowCategory);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
        $('button[data-dismiss=modal]').click(() => {
            $('.form-control').val('');
        });
        $('#formAddCategory').submit((event) => {
            event.preventDefault();
            var cate = getCategoryInput();
            storeCategory(cate);
            $('button[data-dismiss=modal]').click();
        });
    </script>
@endsection