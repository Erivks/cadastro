@extends('layouts.app')

@section('title', 'Produtos')

@section('body')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Produtos</h5>
        <table class="table table-ordered table-hover" id="tableProduct">
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
        <button class="btn btn-primary" type="button" 
            role="button" data-toggle="modal" 
            data-target="#modalProduct" id="btnAddProduct">
            Adicionar produtos
        </button>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="modalProduct">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" class="form-horizontal" id="formProduct">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Novo Produto
                    </h5>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" class="form-control" id="id">
                    <div class="form-group">
                        <label for="productName" class="control-label">Nome: *</label>
                        <input type="text" class="form-control" id="productName" name="productName">
                    </div>
                    <div class="form-group">
                        <label for="productStock" class="control-label">Estoque: *</label>
                        <input type="text" class="form-control" id="productStock" name="productStock">
                    </div>
                    <div class="form-group">
                        <label for="productPrice" class="control-label">Preço: *</label>
                        <input type="text" class="form-control" id="productPrice" name="productPrice">
                    </div>
                    <div class="form-group">
                        <label for="productCategory" class="control-label">Categoria: *</label>
                        <select name="productCategory" id="productCategory" class="custom-select">
                            <option disabled selected>Selecione uma categoria</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" role="button" data-dismiss="modal" id="modalCancelAdd">Cancelar</button>
                    <button type="submit" class="btn btn-primary" role="button">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" role="dialog" tabindex="-1" id="modalDeleteProduct">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Confirmar exclusão?
                </h5>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir este produto?
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" 
                    role="button" data-dismiss="modal" id="closeModalDelete">
                    Cancelar
                </button>
                <button class="btn btn-danger" type="button"
                    role="button" id="deleteProductModal" data-id="" onclick="deleteConfirmation()">
                    Deletar
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script>
        function makeRowProduct(product)
        {
            const rowProduct = "<tr>" +
                                    "<td>" + product.id + "</td>" +
                                    "<td>" + product.nome + "</td>" +
                                    "<td>" + product.estoque + "</td>" +
                                    "<td>" + product.preco + "</td>" +
                                    "<td>" + product.cat_nome + "</td>" +
                                    "<td>" +
                                        '<button class="btn btn-primary">'
                                            + 'Editar' +
                                        '</button>' +
                                    "</td>" +
                                    "<td>" +
                                        '<button onclick="getDataId()" type="button" class="btn btn-danger deleteButtonProduct"' +
                                            'data-target="#modalDeleteProduct" data-toggle="modal" data-id="'+ product.id +'">'
                                            + 'Deletar' +
                                        '</button>' +
                                    "</td>" +
                                    "<td>" +
                                        '<button class="btn btn-warning">'
                                            + 'Detalhes' +
                                        '</button>' +
                                    "</td>" +
                                "</tr>";
            return rowProduct;
        }
        function makeOptionCategory(category)
        {
            let option = document.createElement('option');
            option.setAttribute('value', category.id);
            let name = document.createTextNode(category.nome);
            option.appendChild(name);
            return option
        }

        function loadCategories()
        {
            $.get('/api/categorias', function(data) {
                let categories = JSON.parse(data);       
                for(let i=0; i < categories.length; i++)
                {
                    let optionCategory = makeOptionCategory(categories[i]);
                    $('#productCategory').append(optionCategory);
                }
            });
        }
        function loadProducts()
        {
            $.get('/api/produtos', function(data) {
                let products = JSON.parse(data);
                for (let i = 0; i < products.length; i++) 
                {
                    const product = makeRowProduct(products[i]);
                    $('#tableProduct>tbody').append(product);    
                }
            })
        }
        function storeProduct(product)
        {   
            return $.ajax({
                url: '/api/produtos',
                type: 'POST',
                data: product,
                dataType: 'JSON',
                success: function (data) {
                    console.log(data.product);
                    var row = makeRowProduct(data.product);
                    $('#tableProduct>tbody').append(row);    
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
        function getDataId()
        {
            var id = $('.deleteButtonProduct').data('id');
            $('#deleteProductModal').attr('data-id', id);
        }
        function deleteConfirmation()
        {
            var id = $('#deleteProductModal').data('id');
            deleteProduct(id);
            $('#closeModalDelete').click();
        }
        function deleteRow(id)
        {
            var rows = $('#tableProduct>tbody>tr');
            var row = rows.filter(function (i, element) {
                return element.cells[0].textContent == id
            });
            if (row) {
                return row.remove();
            }
            
        }
        function deleteProduct(idProduct)
        {
            return $.ajax({
                url: '/api/produtos/' + idProduct,
                context: this,
                type: 'DELETE',
                success: (data) => {
                    deleteRow(idProduct);
                },
                error: (data) => {
                    console.log(data);
                }
            });
        }
        function getProductInput()
        {
            const product = {
                nome: $('#productName').val(),
                estoque: $('#productStock').val(),
                preco: $('#productPrice').val(),
                categoria_id: $('#productCategory').val()
            }
            return product
        }
        $('#btnAddProduct').on('click', function() {
            $('.form-control').val('');       
        });
        $('#formProduct').submit(function(event){
            event.preventDefault();
            const product = getProductInput();
            storeProduct(product);
            $('#modalCancelAdd').click();
        });
        $(document).ready( () => {
            loadCategories();
            loadProducts();
        });
    </script>
@endsection