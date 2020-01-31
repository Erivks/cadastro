@extends('layouts.app')

@section('title', 'Categoria - Editar')

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('category.update', $category['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="categoryName">Nome Categoria</label>
                    <input type="text" class="form-control @error('categoryName') is-invalid @enderror" 
                        value="{{ $category['nome'] }}" name="categoryName">
                    @error('categoryName')
                        <small class="form-text tex-muted error-message">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit" role="button">Editar</button>
                <button class="btn btn-danger" type="cancel" role="button">Cancelar</button>
            </form>
        </div>
    </div>
@endsection