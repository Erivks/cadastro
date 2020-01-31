@extends('layouts.app')

@section('title', 'Categoria - Adicionar')

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/categorias" method="post">
                @csrf
                <div class="form-group">
                    <label for="categoryName">Nome da Categoria</label>
                    <input type="text" 
                        name="categoryName" 
                        class="form-control" 
                        placeholder="Categoria"
                        >
                    @error('categoryName')
                        <small class="form-text tex-muted">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="reset" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
        </div>
    </div>
@endsection