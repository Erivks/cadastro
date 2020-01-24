@extends('layouts.app')

@section('title', 'Categoria - Lista')
    
@section('body')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Categorias</h5>
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
                                <a
                                    class="btn btn-danger"
                                    role="button"> 
                                    Deletar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>    
@endsection