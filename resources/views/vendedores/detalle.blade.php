@extends('layouts.navbar')
@section('titulo', $vendedor->nom_emprendimiento)
@section('content')

    <livewire:detalle-emprendimiento :id="$vendedor->id" />

@endsection