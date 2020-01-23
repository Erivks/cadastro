@extends('layouts.app')

@section('body')
    @foreach ($categories as $category)
    <p>{{ $category['nome'] }}</p>
    @endforeach
@endsection