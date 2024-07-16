@extends('layouts.navbar')

@section('titulo', 'Carrito de Compras')

@section('content')
@can('verCarrito')
    <style>
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    </style>

    <livewire:carritocompra />
    
@else
    <div class="alert alert-success text-center mx-5" role="alert">
    Acceso no Autorizado
    </div>
@endcan
@endsection