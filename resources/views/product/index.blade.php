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
                    <input type="hidden" class="form-control" id="id">
                    <div class="form-group">
                        <label for="productName" class="control-label">Nome: *</label>
                        <input type="text" class="form-control" id="productName">
                    </div>
                    <div class="form-group">
                        <label for="productStock" class="control-label">Estoque: *</label>
                        <input type="text" class="form-control" id="productStock">
                    </div>
                    <div class="form-group">
                        <label for="productPrice" class="control-label">Preço: *</label>
                        <input type="text" class="form-control" id="productPrice">
                    </div>
                    <div class="form-group">
                        <label for="productCategory" class="control-label">Categoria: *</label>
                        <select name="productCategory" id="productCategory" class="custom-select">
                            <option disabled selected>Selecione uma categoria</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" role="button" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" role="button">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
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
                                        '<button class="btn btn-danger">'
                                            + 'Apagar' +
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
            $.post('api/produtos', product, function(data)
            {
                console.log(data);
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
            const product = getProduct();
            storeProduct(product);
        });
        $(document).ready( () => {
            loadCategories();
            loadProducts();
        }); 
    </script>
@endsection