@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Nuevo Producto</h1>
    <form action="{{ route('productos.store') }}" method="POST">
        @include('productos._form')
    </form>
</div>
@endsection