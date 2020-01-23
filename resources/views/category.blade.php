@extends('layouts.app')

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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>    
@endsection